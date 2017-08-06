<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Pharmacie;
use BackendBundle\Form\Type\PharmacieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class PharmacieController extends Controller
{

    /**
     * @Route("/pharmacie", name="pharmacie")
     */
    public function addAction(Request $request)
    {

        $pharmacieManager = $this->get('pharmacie_manager');
        $pharmacie = new Pharmacie();
        $form = $this->createForm(PharmacieType::class,$pharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->get('valider')->isClicked()){
                $pharmacieManager->setForm($form)->create();
                return $this->redirectToRoute('pharmacie');
            }
            if ($form->get('annuler')->isClicked()){
                var_dump('Bonjour, je suis le boutton annuler');die();
                $pharmacieManager->setForm($form)->create();
                return $this->redirectToRoute('pharmacie');
            }


            return $this->redirectToRoute('pharmacies');
        }

        // replace this example code with whatever you need
        return $this->render('BackendBundle:Pharmacie:add.html.twig', ['form' => $form->createView()]);
    }

    /**
     * Displays a form to edit an existing pharmacie entity.
     *
     * @Route("/pharmacie/{id}", name="pharmacie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pharmacie $pharmacie)
    {
        $pharmacieManager = $this->get('pharmacie_manager');
        //$pharmacie = new Pharmacie();
        $form = $this->createForm(PharmacieType::class,$pharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pharmacie_edit', array('id' => $pharmacie->getId()));
        }

        return $this->render('BackendBundle:Pharmacie:edit.html.twig', array(
            'pharmacie' => $pharmacie,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/pharmacies", name="pharmacies")
     */
    public function pharmaciesAction (Request $request)
    {

        $pharmacieManager = $this->get('pharmacie_manager');
        $repository = $this->getDoctrine()->getRepository(Pharmacie::class);
        $pharmacies = $repository->findAll();

        return $this->render('BackendBundle:Pharmacie:pharmacies.html.twig',
            [
                'pharmacies' => $pharmacies
            ]
        );
    }

    /**
     * @Route("/pharmacie/remove/{id}", name="removePharmacie")
     */
    public function removeAction (Request $request, $id)
    {
        $pharmacieManager = $this->get('pharmacie_manager');
        $pharmacieManager->remove($id);

        return $this->redirectToRoute('pharmacies');
    }
    /**
     * @Route("/pharmacie/delete/{id}", name="pharmacie_delete")
     */
    public function deleteAction(Request $request, Pharmacie $pharmacie)
    {
        $form = $this->createForm(PharmacieType::class,$pharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pharmacie);
            $em->flush($pharmacie);
            return $this->redirectToRoute('pharmacies');
        }

        return $this->render('BackendBundle:Pharmacie:delete.html.twig', ['form' => $form->createView()]);
    }
}
