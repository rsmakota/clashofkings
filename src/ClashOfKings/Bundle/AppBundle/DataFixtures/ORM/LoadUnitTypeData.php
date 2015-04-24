<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\DataFixtures\ORM;


use ClashOfKings\Bundle\AppBundle\Entity\UnitType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadUnitTypeData
 *
 * @package ClashOfKings\Bundle\AppBundle\DataFixtures\ORM
 */
class LoadUnitTypeData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $groupArmy = $this->getReference('unit_group:army');

        $type = new UnitType();
        $type->setName('unit_type.archer_name');
        $type->setGroup($groupArmy);
        $type->setDescription('unit_type.archer_description');
        $manager->persist($type);
        $this->addReference('unit_type:archer', $type);
        ////////////////////////////////////////////////////////
        $type = new UnitType();
        $type->setName('unit_type.cavalry_name');
        $type->setGroup($groupArmy);
        $type->setDescription('unit_type.cavalry_description');
        $manager->persist($type);
        $this->addReference('unit_type:cavalry', $type);
        ////////////////////////////////////////////////////////
        $type = new UnitType();
        $type->setName('unit_type.infantry_name');
        $type->setGroup($groupArmy);
        $type->setDescription('unit_type.infantry_description');
        $manager->persist($type);
        $this->addReference('unit_type:infantry', $type);
        ////////////////////////////////////////////////////////
        $type = new UnitType();
        $type->setName('unit_type.siege_weapon_name');
        $type->setGroup($groupArmy);
        $type->setDescription('unit_type.siege_weapon_description');
        $manager->persist($type);
        $this->addReference('unit_type:siege_weapon', $type);
        ////////////////////////////////////////////////////////

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 120;
    }
}