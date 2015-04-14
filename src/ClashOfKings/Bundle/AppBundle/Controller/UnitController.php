<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Controller;

use ClashOfKings\Bundle\AppBundle\Entity\Unit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class UnitController
 *
 * @package ClashOfKings\Bundle\AppBundle\Controller
 */
class UnitController extends Controller
{
    /**
     * @param integer $index
     *
     * @Route("/info/{index}", name="unitInfo")
     * @Template()
     *
     * @return array
     */
    public function unitInfoAction($index)
    {
        $building = $this->getDoctrine()->getManager()->getRepository(Unit::clazz())->find($index);

        return ['unit' => $building];
    }

    /**
     * Building list
     * @Route("/list", name="unitList")
     * @Template()
     *
     * @return array
     */
    public function unitListAction()
    {
        $buildings = $this->getDoctrine()->getManager()->getRepository(Unit::clazz())->findAll();

        return ['units' => $buildings];
    }
}