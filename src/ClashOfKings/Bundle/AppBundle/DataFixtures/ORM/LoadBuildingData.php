<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 ClashOfKings
 */

namespace ClashOfKings\Bundle\AppBundle\DataFixtures\ORM;


use ClashOfKings\Bundle\AppBundle\Entity\Building;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadBuildingData
 *
 * @package ClashOfKings\Bundle\AppBundle\DataFixtures\ORM
 */
class LoadBuildingData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $building = new Building();
        $building->setName('farm.name');
        $building->setTitle('farm.title');
        $building->setDescription('farm.description');
        $building->setRemark('farm.remark');
        $building->setImg('/upload/buildings/farm.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('sawmill.name');
        $building->setTitle('sawmill.title');
        $building->setDescription('sawmill.description');
        $building->setRemark('sawmill.remark');
        $building->setImg('/upload/buildings/sawmill.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('hospital.name');
        $building->setTitle('hospital.title');
        $building->setDescription('hospital.description');
        $building->setRemark('hospital.remark');
        $building->setImg('/upload/buildings/hospital.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('millitary_tent.name');
        $building->setTitle('millitary_tent.title');
        $building->setDescription('millitary_tent.description');
        $building->setRemark('millitary_tent.remark');
        $building->setImg('/upload/buildings/millitary_tent.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('castle.name');
        $building->setTitle('castle.title');
        $building->setDescription('castle.description');
        $building->setRemark('castle.remark');
        $building->setImg('/upload/buildings/castle.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('fortress.name');
        $building->setTitle('fortress.title');
        $building->setDescription('fortress.description');
        $building->setRemark('fortress.remark');
        $building->setImg('/upload/buildings/fortress.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('college.name');
        $building->setTitle('college.title');
        $building->setDescription('college.description');
        $building->setRemark('college.remark');
        $building->setImg('/upload/buildings/college.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('range.name');
        $building->setTitle('range.title');
        $building->setDescription('range.description');
        $building->setRemark('range.remark');
        $building->setImg('/upload/buildings/range.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('chariot_plant.name');
        $building->setTitle('chariot_plant.title');
        $building->setDescription('chariot_plant.description');
        $building->setRemark('chariot_plant.remark');
        $building->setImg('/upload/buildings/chariot_plant.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('barracks.name');
        $building->setTitle('barracks.title');
        $building->setDescription('barracks.description');
        $building->setRemark('barracks.remark');
        $building->setImg('/upload/buildings/barracks.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('stables.name');
        $building->setTitle('stables.title');
        $building->setDescription('stables.description');
        $building->setRemark('stables.remark');
        $building->setImg('/upload/buildings/stables.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('walls.name');
        $building->setTitle('walls.title');
        $building->setDescription('walls.description');
        $building->setRemark('walls.remark');
        $building->setImg('/upload/buildings/walls.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('watchtower.name');
        $building->setTitle('watchtower.title');
        $building->setDescription('watchtower.description');
        $building->setRemark('watchtower.remark');
        $building->setImg('/upload/buildings/watchtower.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('drill_grounds.name');
        $building->setTitle('drill_grounds.title');
        $building->setDescription('drill_grounds.description');
        $building->setRemark('drill_grounds.remark');
        $building->setImg('/upload/buildings/drill_grounds.png');
        $manager->persist($building);

        $building = new Building();
        $building->setName('market.name');
        $building->setTitle('market.title');
        $building->setDescription('market.description');
        $building->setRemark('market.remark');
        $building->setImg('/upload/buildings/market.png');
        $manager->persist($building);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 100;
    }
}