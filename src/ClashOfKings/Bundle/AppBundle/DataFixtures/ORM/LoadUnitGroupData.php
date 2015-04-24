<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace ClashOfKings\Bundle\AppBundle\DataFixtures\ORM;


use ClashOfKings\Bundle\AppBundle\Entity\Unit;
use ClashOfKings\Bundle\AppBundle\Entity\UnitGroup;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUnitGroupData  extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $group = new UnitGroup();
        $group->setId(Unit::GROUP_ARMY);
        $group->setName('unit_group.army_name');
        $manager->persist($group);
        $this->addReference('unit_group:army', $group);
        ///////////////////////////////////////////////////////
        $group = new UnitGroup();
        $group->setId(Unit::GROUP_MONSTER);
        $group->setName('unit_group.monster_name');
        $manager->persist($group);
        $this->addReference('unit_group:monster', $group);
        ///////////////////////////////////////////////////////

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