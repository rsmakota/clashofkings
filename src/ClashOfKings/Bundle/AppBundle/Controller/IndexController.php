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
    protected function getBuildingManager()
    {
        return $this->get('clash_of_kings.building_manager');
    }

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

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function buildingListAction()
    {
        $buildings = $this->getBuildingManager()->getRepository()->findAll();

        return $this->render('ClashOfKingsAppBundle:Index:buildingList.html.twig', ['buildings' => $buildings]);
    }

}
