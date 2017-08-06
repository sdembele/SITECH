<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\ImageArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Imagearticle controller.
 *
 * @Route("imagearticle")
 */
class ImageArticleController extends Controller
{
    /**
     * Lists all imageArticle entities.
     *
     * @Route("/", name="imagearticle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imageArticles = $em->getRepository(ImageArticle::class)->findAll();

        return $this->render('imagearticle/index.html.twig', array(
            'imageArticles' => $imageArticles,
        ));
    }

    /**
     * Creates a new imageArticle entity.
     *
     * @Route("/new", name="imagearticle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imageArticle = new Imagearticle();
        $form = $this->createForm('BackendBundle\Form\ImageArticleType', $imageArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageArticle);
            $em->flush();

            return $this->redirectToRoute('imagearticle_show', array('id' => $imageArticle->getId()));
        }

        return $this->render('imagearticle/new.html.twig', array(
            'imageArticle' => $imageArticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imageArticle entity.
     *
     * @Route("/{id}", name="imagearticle_show")
     * @Method("GET")
     */
    public function showAction(ImageArticle $imageArticle)
    {
        $deleteForm = $this->createDeleteForm($imageArticle);

        return $this->render('imagearticle/show.html.twig', array(
            'imageArticle' => $imageArticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imageArticle entity.
     *
     * @Route("/{id}/edit", name="imagearticle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImageArticle $imageArticle)
    {
        $deleteForm = $this->createDeleteForm($imageArticle);
        $editForm = $this->createForm('BackendBundle\Form\ImageArticleType', $imageArticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagearticle_edit', array('id' => $imageArticle->getId()));
        }

        return $this->render('imagearticle/edit.html.twig', array(
            'imageArticle' => $imageArticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imageArticle entity.
     *
     * @Route("/{id}", name="imagearticle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImageArticle $imageArticle)
    {
        $form = $this->createDeleteForm($imageArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imageArticle);
            $em->flush();
        }

        return $this->redirectToRoute('imagearticle_index');
    }

    /**
     * Creates a form to delete a imageArticle entity.
     *
     * @param ImageArticle $imageArticle The imageArticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImageArticle $imageArticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagearticle_delete', array('id' => $imageArticle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
