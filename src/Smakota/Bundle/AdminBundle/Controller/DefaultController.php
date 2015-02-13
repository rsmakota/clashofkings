<?php

namespace Smakota\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SmakotaAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
