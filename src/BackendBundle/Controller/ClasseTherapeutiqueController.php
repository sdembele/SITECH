<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\ClasseTherapeutique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Classetherapeutique controller.
 *
 * @Route("classetherapeutique")
 */
class ClasseTherapeutiqueController extends Controller
{
    /**
     * Lists all classeTherapeutique entities.
     *
     * @Route("/", name="classetherapeutique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $classeTherapeutiques = $em->getRepository(ClasseTherapeutique::class)->findAll();

        return $this->render('BackendBundle:classetherapeutique:index.html.twig', array(
            'classeTherapeutiques' => $classeTherapeutiques,
        ));
    }

    /**
     * Creates a new classeTherapeutique entity.
     *
     * @Route("/new", name="classetherapeutique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $classeTherapeutique = new Classetherapeutique();
        $form = $this->createForm('BackendBundle\Form\ClasseTherapeutique\ClasseTherapeutiqueType', $classeTherapeutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //var_dump($request);die;
            $em = $this->getDoctrine()->getManager();
            $classeTherapeutique->setCreatedBy(1);
            $classeTherapeutique->setCreationDate(new \DateTime());
            $classeTherapeutique->setLastUpdateBy(1);
            $classeTherapeutique->setLastUpdateDate(new \DateTime());
            $em->persist($classeTherapeutique);
            $em->flush();

            return $this->redirectToRoute('classetherapeutique_show', array('id' => $classeTherapeutique->getId()));
        }

        return $this->render('BackendBundle:classetherapeutique:new.html.twig', array(
            'classeTherapeutique' => $classeTherapeutique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a classeTherapeutique entity.
     *
     * @Route("/{id}", name="classetherapeutique_show")
     * @Method("GET")
     */
    public function showAction(ClasseTherapeutique $classeTherapeutique)
    {
        $deleteForm = $this->createDeleteForm($classeTherapeutique);

        return $this->render('BackendBundle:classetherapeutique:show.html.twig', array(
            'classeTherapeutique' => $classeTherapeutique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing classeTherapeutique entity.
     *
     * @Route("/{id}/edit", name="classetherapeutique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ClasseTherapeutique $classeTherapeutique)
    {
        $deleteForm = $this->createDeleteForm($classeTherapeutique);
        $editForm = $this->createForm('BackendBundle\Form\ClasseTherapeutique\ClasseTherapeutiqueType', $classeTherapeutique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('classetherapeutique_edit', array('id' => $classeTherapeutique->getId()));
        }

        return $this->render('BackendBundle:classetherapeutique:edit.html.twig', array(
            'classeTherapeutique' => $classeTherapeutique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a classeTherapeutique entity.
     *
     * @Route("/{id}", name="classetherapeutique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ClasseTherapeutique $classeTherapeutique)
    {
        $form = $this->createDeleteForm($classeTherapeutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($classeTherapeutique);
            $em->flush();
        }

        return $this->redirectToRoute('classetherapeutique_index');
    }

    /**
     * Creates a form to delete a classeTherapeutique entity.
     *
     * @param ClasseTherapeutique $classeTherapeutique The classeTherapeutique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClasseTherapeutique $classeTherapeutique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classetherapeutique_delete', array('id' => $classeTherapeutique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
