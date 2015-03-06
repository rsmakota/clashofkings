<?php

namespace Smakota\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class LoginController extends Controller
{

    public function loginAction(Request $request)
    {
        file_put_contents('/tmp/clash.log', print_r($request, true));
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

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
