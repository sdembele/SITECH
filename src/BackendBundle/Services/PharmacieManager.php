<?php

namespace BackendBundle\Services;



use BackendBundle\Entity\Pharmacie;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class PharmacieManager
{
    private $em;
    private $repository;
    private $tokenStorage;
    private $session;
    private $user;
    private $form;

    public function __construct(EntityManager $entityManager, TokenStorage $tokenStorage)
    {
        $this->em = $entityManager;
        $this->repository = $this->em->getRepository(Pharmacie::class);
        $this->tokenStorage = $tokenStorage;
        $this->user = $this->tokenStorage->getToken()->getUser();
        $this->session = new Session();
    }

    public function setForm($form){
        $this->form = $form;
        return $this;
    }

    public function create()
    {

        if ($this->form->isSubmitted())
        {
            $pharmacie = $this->form->getData();
            $pharmacie->setCreatedBy('ADMIN');
            $pharmacie->setCreationDate(new \DateTime('now'));
            $pharmacie->setLastUpdatedBy('ADMIN');
            $pharmacie->setLastUpdateDate(new \DateTime('now'));

            $this->flush($pharmacie);

            $this->session->getFlashBag()->add('success', 'Nouveau pays correctement ajoute');
        }
    }

    public function update()
    {
        $pharmacie = $this->form->getData();

        if($this->form->get('changeOwner')->isClicked()){
            $pharmacie->setUser($this->getUser()->getId());
        }

        $this->flush($pharmacie);
        $this->session->getFlashBag()->add('infos', 'Objet correctement ajoute');
    }

    public function flush($pharmacie)
    {
        $this->em->persist($pharmacie);
        $this->em->flush();
    }

    public function getCollections()
    {
        return $this->getCollections();
    }

    public function getAll(){
        return $this->repository->findAll();
    }

    public function getOne($id){
        return $this->repository->find($id);
    }

    public function remove($id){
      $pharmacie = $this->repository->find($id);
      $this->em->remove($pharmacie);
      $this->em->flush();
    }
}
