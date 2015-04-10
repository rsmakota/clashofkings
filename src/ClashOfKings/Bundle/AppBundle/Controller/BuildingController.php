<?php

namespace ClashOfKings\Bundle\AppBundle\Controller;

use ClashOfKings\Bundle\AppBundle\Entity\Building;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class BuildingController
 *
 * @package ClashOfKings\Bundle\AppBundle\Controller
 */
class BuildingController extends Controller
{
    protected function getBuildingManager()
    {
        return $this->get('clash_of_kings.building_manager');
    }

    /**
     * @param integer $index
     *
     * @Route("/info/{index}", name="buildingInfo")
     * @Template()
     *
     * @return array
     */
    public function buildingInfoAction($index)
    {
        $building = $this->getDoctrine()->getManager()->getRepository(Building::clazz())->find($index);

        return ['building' => $building];
    }

    /**
     * Building list
     * @Route("/list", name="buildingList")
     * @Template()
     *
     * @return array
     */
    public function buildingListAction()
    {
        $buildings = $this->getBuildingManager()->getRepository()->findAll();

        return ['buildings' => $buildings];
    }
}