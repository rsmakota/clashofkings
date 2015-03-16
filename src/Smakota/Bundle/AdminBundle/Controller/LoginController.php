<?php

namespace Smakota\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class LoginController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        //file_put_contents('/tmp/clash.log', print_r($request, true));
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        $result = [
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error
        ];
        return $this->render('SmakotaAdminBundle:Default:login.html.twig', $result);
    }

    public function logoutAction()
    {

    }

    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }
}
