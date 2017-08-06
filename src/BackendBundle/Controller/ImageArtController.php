<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\ImageArt;
use BackendBundle\Form\ImageArtType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Imageart controller.
 *
 * @Route("imageart")
 */
class ImageArtController extends Controller
{
    /**
     * Lists all imageArt entities.
     *
     * @Route("/", name="imageart_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imageArts = $em->getRepository(ImageArt::class)->findAll();
        

        return $this->render('imageart/index.html.twig', array(
            'imageArts' => $imageArts,
        ));
    }

    /**
     * Creates a new imageArt entity.
     *
     * @Route("/new", name="imageart_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imageArt = new ImageArt();
        $form = $this->createForm('BackendBundle\Form\ImageArtType', $imageArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageArt);
            $em->flush();

            return $this->redirectToRoute('imageart_show', array('id' => $imageArt->getId()));
        }

        return $this->render('imageart/new.html.twig', array(
            'imageArt' => $imageArt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imageArt entity.
     *
     * @Route("/{id}", name="imageart_show")
     * @Method("GET")
     */
    public function showAction(ImageArt $imageArt)
    {
        $deleteForm = $this->createDeleteForm($imageArt);

        return $this->render('imageart/show.html.twig', array(
            'imageArt' => $imageArt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imageArt entity.
     *
     * @Route("/edit/{id}", name="imageart_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImageArt $imageArt)
    {
        $deleteForm = $this->createDeleteForm($imageArt);
        $editForm = $this->createForm('BackendBundle\Form\ImageArtType', $imageArt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imageart_edit', array('id' => $imageArt->getId()));
        }

        return $this->render('imageart/edit.html.twig', array(
            'imageArt' => $imageArt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imageArt entity.
     *
     * @Route("/{id}", name="imageart_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImageArt $imageArt)
    {
        $form = $this->createDeleteForm($imageArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imageArt);
            $em->flush();
        }

        return $this->redirectToRoute('imageart_index');
    }

    /**
     * Creates a form to delete a imageArt entity.
     *
     * @param ImageArt $imageArt The imageArt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImageArt $imageArt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imageart_delete', array('id' => $imageArt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
