<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace ClashOfKings\Bundle\AppBundle\Service;

use ClashOfKings\Bundle\AppBundle\Entity\Building;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;


/**
 * Class BuildingManager
 *
 * @package AppBundle\Service
 */
class BuildingManager extends AbstractManager
{
    /**
     * @param array $params
     *
     * @return Building
     */
    public function create(array $params)
    {
        $bag = new ParameterBag($params);
        $building = new Building();
        $building->setImg($bag->get('img'));
        $building->setName($bag->get('name'));
        $building->setTitle($bag->get('title'));
        $building->setRemark($bag->get('remark'));
        $building->setDescription($bag->get('description'));

        $this->eManager->persist($building);
        $this->eManager->flush();

        return $building;
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return Building::clazz();
    }
}