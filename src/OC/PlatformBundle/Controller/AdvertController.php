<?php
namespace OC\PlatformBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
   public function indexAction()
   {
       $listAdverts = array(
           array(
               'title'   => 'Recherche développpeur Symfony',
               'id'      => 1,
               'author'  => 'Alexandre',
               'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
               'date'    => new \Datetime()),
           array(
               'title'   => 'Mission de webmaster',
               'id'      => 2,
               'author'  => 'Hugo',
               'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
               'date'    => new \Datetime()),
           array(
               'title'   => 'Offre de stage webdesigner',
               'id'      => 3,
               'author'  => 'Mathieu',
               'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
               'date'    => new \Datetime())
       );

       // Et modifiez le 2nd argument pour injecter notre liste
       return $this->render('OCPlatformBundle:Advert:pharmacies.html.twig', array(
           'listAdverts' => $listAdverts
       ));
       /*$content = $this->get('templating')->render('OCPlatformBundle:Advert:pharmacies.html.twig',
           array('nom'=>'DEMBELE'));

       $url = $this->get('router')->generate('oc_platform_view',array('id'=>5));

       //$url2 = $this->generateUrl('oc_platform_view',array('id'=>15));
       return new Response("L'url de l'annonce 5 est : $url");*/
   }

   public function menuAction()
   {
       $listAdverts = array(
           array('id' => 2, 'title' => 'Recherche développeur Symfony'),
           array('id' => 5, 'title' => 'Mission de webmaster'),
           array('id' => 9, 'title' => 'Offre de stage webdesigner')
       );

       return $this->render('OCPlatformBundle:Advert:menu.html.twig', array('listAdverts' => $listAdverts));
   }

   public function viewAction($id, Request $request)
   {
       $advert = array(
           'title'   => 'Recherche développpeur Symfony2',
           'id'      => $id,
           'author'  => 'Alexandre',
           'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
           'date'    => new \Datetime()
       );
       return $this->render('OCPlatformBundle:Advert:view.html.twig',array('advert'=>$advert));
       /*$tag = $request->query->get('tag');
       //$content = $this->get('templating')->render('OCPlatformBundle:Advert:view.html.twig',array('nom'=>'DEMBELE','id'=>$id,'tag'=>$tag));
       //return new Response("tag = $content");

       $session = $request->getSession();

       $session->set('user_id',1212);
       $session->set('user_name',1212);

       return $this->render('OCPlatformBundle:Advert:view.html.twig',
                           array('nom'=>'DEMBELE',
                                 'id'=>$id,
                                 'tag'=>$tag));
       */
   }

   public function addAction(Request $request)
   {
       /*if ($request->isMethode('POST'))
       {
           $session = $request->getSession();
           $session->getFlashBag()->add('info','test123');
           $session->getFlashBag()->add('info','123test');
           $request->getSession()->getFlashBag->add('notice','Ánnonce creee');
           return $this->redirectToRoute('oc_platform_view',array('id',5));
       }*/
       //return $this->redirectToRoute('oc_platform_view',array('id'=>1));
       return $this->render('OCPlatformBundle:Advert:add.html.twig');
   }

   public function editAction($id, Request $request)
   {
       /*if ($request->isMethode('POST'))
       {
           $session = $request->getSession();
           $session->getFlashBag()->add('info','test123');
           $session->getFlashBag()->add('info','123test');
           $request->getSession()->getFlashBag->add('notice','Ánnonce creee');
           return $this->redirectToRoute('oc_platform_view',array('id',5));
       }
       return $this->render('OCPlatformBundle:Advert:add.html.twig');

       return $this->redirectToRoute('oc_platform_view',array('id'=>1));*/
       $advert = array(
           'title'   => 'Recherche développpeur Symfony2',
           'id'      => $id,
           'author'  => 'Alexandre',
           'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
           'date'    => new \Datetime()
       );
       return $this->render('OCPlatformBundle:Advert:edit.html.twig',array('advert'=>$advert));
   }

   public function deleteAction($id)
   {
       return $this->render('OCPlatformBundle:Advert:add.html.twig');
   }

   public function templateAction()
   {
       return $this->render('OCPlatformBundle:Advert:template.html.twig');
   }
}