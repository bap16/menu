<?php

namespace Home\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortalBundle:Default:index.html.php');
    }

    public function createEpicAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $menus = $entityManager->getRepository('PortalBundle:Menu')->findAll();
        $menu = $entityManager->find('PortalBundle:Menu', 1);

        $entityManager->flush();

        return $this->render(
            'PortalBundle:Default:createEpic.html.php',
            array('menu' => $menu)
        );
    }

    public function createPastaBellaAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $menus = $entityManager->getRepository('PortalBundle:Menu')->findAll();
        $menu = $entityManager->find('PortalBundle:Menu', 3);

        $entityManager->flush();

        return $this->render(
            'PortalBundle:Default:createEpic.html.php',
            array('menu' => $menu)
        );
    }

// if you have multiple entity managers, use the registry to fetch them
    public function editAction()
    {
        $doctrine = $this->getDoctrine();
        $entityManager = $doctrine->getManager();
        $otherEntityManager = $doctrine->getManager('other_connection');
    }
}
