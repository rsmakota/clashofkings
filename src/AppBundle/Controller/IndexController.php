<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 *
 * @package AppBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Index:index.html.twig');
    }

    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function inviteCodeAction()
    {
        return $this->render('AppBundle:Index:inviteCode.html.twig');
    }
}
