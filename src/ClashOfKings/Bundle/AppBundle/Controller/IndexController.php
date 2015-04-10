<?php

namespace ClashOfKings\Bundle\AppBundle\Controller;

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
        return $this->render('ClashOfKingsAppBundle:Index:index.html.twig');
    }

    /**
     * @param $advice
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adviceAction($advice)
    {
        return $this->render('ClashOfKingsAppBundle:Index:'.$advice.'.html.twig');
    }



}
