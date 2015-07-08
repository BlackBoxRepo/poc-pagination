<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->get('doctrine.orm.entity_manager');
        $repo = $em->getRepository('AppBundle:Product');

        $query = $repo->createQueryBuilder('p')->getQuery();

        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 2)
        );

        return $this->render('AppBundle::index.html.twig', array('pagination' => $pagination));
    }
}
