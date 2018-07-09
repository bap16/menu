<?php

namespace Home\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Home\PortalBundle\Entity\Menu;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortalBundle:Default:index.html.twig');
    }

    public function createActionhiba()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: createAction(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Menu();
        $product->setText('Etlap');
        $product->setDay('Kedd');
        $product->setRestaurantId(1);

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);
//        $entityManager->find("menu", 1);

        $query = $entityManager->createQuery("SET LOCK MODE TO WAIT 120");
//        $users = $query->getResult();

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getMenuId());
    }

// if you have multiple entity managers, use the registry to fetch them
    public function editAction()
    {
        $doctrine = $this->getDoctrine();
        $entityManager = $doctrine->getManager();
        $otherEntityManager = $doctrine->getManager('other_connection');
    }

    public function createAction () {

//        return $this->render("@Portal/Default/create.html.php",$menu);
//        return new Response($menu);
    }
}
