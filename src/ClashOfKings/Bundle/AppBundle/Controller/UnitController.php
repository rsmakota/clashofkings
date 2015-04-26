<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Controller;

use ClashOfKings\Bundle\AppBundle\Entity\Unit;
use ClashOfKings\Bundle\AppBundle\Entity\UnitType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UnitController
 *
 * @package ClashOfKings\Bundle\AppBundle\Controller
 */
class UnitController extends Controller
{
    /**
     * @return EntityRepository
     */
    protected function getUnitRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository(Unit::clazz());
    }
    /**
     * @return EntityRepository
     */
    protected function getUnitTypeRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository(UnitType::clazz());
    }

    /**
     * @return array
     */
    protected function getUnitTypesArmy()
    {
        return $this->getUnitTypeRepository()->findBy(['group' => Unit::GROUP_ARMY], ['id' => 'ASC']);
    }

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
        $unit = $this->getUnitRepository()->find($index);
        $unitTypes   = $this->getUnitTypesArmy();

        return ['unit' => $unit, 'unitTypes' => $unitTypes];
    }

    /**
     * Units list
     * @Route("/list", name="unitList")
     * @Template()
     *
     * @return array
     */
    public function unitListAction()
    {
        $unitTypes = $this->getUnitTypesArmy();

        return ['unitTypes' => $unitTypes ];
    }

    /**
     * Units list
     * @param Request $request
     *
     * @Route("/compare", name="unitCompare")
     * @Template()
     *
     * @return array
     */
    public function unitCompareAction(Request $request)
    {
        $data = $request->request->all();
        $unitOne     = $this->getUnitRepository()->find($data['one']);
        $unitAnother = $this->getUnitRepository()->find($data['another']);
        $unitTypes   = $this->getUnitTypesArmy();

        return ['one' => $unitOne, 'another' => $unitAnother, 'unitTypes' => $unitTypes];
    }
}