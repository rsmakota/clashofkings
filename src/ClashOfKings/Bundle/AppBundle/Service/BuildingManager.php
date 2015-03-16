<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace ClashOfKings\Bundle\AppBundle\Service;

use ClashOfKings\Bundle\AppBundle\Entity\Building;


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
        $building = new Building();
        $building->setName($params['name']);
        $building->setTitle($params['title']);
        $building->setDescription($params['description']);
        $building->setRemark($params['remark']);

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