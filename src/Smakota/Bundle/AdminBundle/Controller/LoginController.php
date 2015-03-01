<?php

namespace Smakota\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{

    public function loginAction()
    {
        return $this->render('SmakotaAdminBundle:Default:login.html.twig');
    }

    public function logoutAction()
    {

    }

    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }
}
