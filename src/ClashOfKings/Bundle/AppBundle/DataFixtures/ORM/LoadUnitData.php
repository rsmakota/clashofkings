<?php
/**
 * Created by PhpStorm.
 * User: rodion
 * Date: 28.03.15
 * Time: 18:57
 */

namespace ClashOfKings\Bundle\AppBundle\DataFixtures\ORM;


use ClashOfKings\Bundle\AppBundle\Entity\Unit;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadUnitData
 *
 * @package ClashOfKings\Bundle\AppBundle\DataFixtures\ORM
 */
class LoadUnitData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 100;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(1);
        $unit->setName('shortbowman_name');
        $unit->setTitle('shortbowman_title');
        $unit->setDescription('shortbowman_description');
        $unit->setAttack(8);
        $unit->setDefense(6);
        $unit->setHealthPoints(3);
        $unit->setRange(5);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(21);
        $unit->setPower(100);
        $unit->setImg('/upload/units/shortbowman.png');

        $manager->persist($unit);
        ///////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(2);
        $unit->setName('longbowman_name');
        $unit->setTitle('longbowman_title');
        $unit->setDescription('longbowman_description');
        $unit->setAttack(11);
        $unit->setDefense(8);
        $unit->setHealthPoints(3);
        $unit->setRange(8);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(42);
        $unit->setPower(140);
        $unit->setImg('/upload/units/longbowman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(3);
        $unit->setName('crossbowman_name');
        $unit->setTitle('crossbowman_title');
        $unit->setDescription('crossbowman_description');
        $unit->setAttack(26);
        $unit->setDefense(13);
        $unit->setHealthPoints(4);
        $unit->setRange(8);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(62);
        $unit->setPower(190);
        $unit->setImg('/upload/units/crossbowman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(4);
        $unit->setName('arbalester_name');
        $unit->setTitle('arbalester_title');
        $unit->setDescription('arbalester_description');
        $unit->setAttack(35);
        $unit->setDefense(17);
        $unit->setHealthPoints(5);
        $unit->setRange(8);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(83);
        $unit->setPower(250);
        $unit->setImg('/upload/units/arbalester.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(5);
        $unit->setName('elite_longbowman_name');
        $unit->setTitle('elite_longbowman_title');
        $unit->setDescription('elite_longbowman_description');
        $unit->setAttack(25);
        $unit->setDefense(19);
        $unit->setHealthPoints(6);
        $unit->setRange(5);
        $unit->setSpeed(8);
        $unit->setLoad(11);
        $unit->setUpkeep(104);
        $unit->setPower(320);
        $unit->setImg('/upload/units/elite_longbowman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(6);
        $unit->setName('archer_guard_name');
        $unit->setTitle('archer_guard_title');
        $unit->setDescription('archer_guard_description');
        $unit->setAttack(32);
        $unit->setDefense(24);
        $unit->setHealthPoints(8);
        $unit->setRange(5);
        $unit->setSpeed(8);
        $unit->setLoad(11);
        $unit->setUpkeep(125);
        $unit->setPower(400);
        $unit->setImg('/upload/units/archer_guard.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(7);
        $unit->setName('heavy_crossbowman_name');
        $unit->setTitle('heavy_crossbowman_title');
        $unit->setDescription('heavy_crossbowman_description');
        $unit->setAttack(68);
        $unit->setDefense(34);
        $unit->setHealthPoints(10);
        $unit->setRange(8);
        $unit->setSpeed(8);
        $unit->setLoad(11);
        $unit->setUpkeep(146);
        $unit->setPower(490);
        $unit->setImg('/upload/units/heavy_crossbowman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(8);
        $unit->setName('eagle_archer_name');
        $unit->setTitle('eagle_archer_title');
        $unit->setDescription('eagle_archer_description');
        $unit->setAttack(47);
        $unit->setDefense(35);
        $unit->setHealthPoints(11);
        $unit->setRange(5);
        $unit->setSpeed(8);
        $unit->setLoad(12);
        $unit->setUpkeep(167);
        $unit->setPower(590);
        $unit->setImg('/upload/units/eagle_archer.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(9);
        $unit->setName('windlass_man_name');
        $unit->setTitle('windlass_man_title');
        $unit->setDescription('windlass_man_description');
        $unit->setAttack(98);
        $unit->setDefense(49);
        $unit->setHealthPoints(13);
        $unit->setRange(8);
        $unit->setSpeed(8);
        $unit->setLoad(12);
        $unit->setUpkeep(188);
        $unit->setPower(700);
        $unit->setImg('/upload/units/windlass_man.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////

        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ARCHER);
        $unit->setLevel(10);
        $unit->setName('marksman_name');
        $unit->setTitle('marksman_title');
        $unit->setDescription('marksman_description');
        $unit->setAttack(65);
        $unit->setDefense(49);
        $unit->setHealthPoints(15);
        $unit->setRange(5);
        $unit->setSpeed(8);
        $unit->setLoad(13);
        $unit->setUpkeep(208);
        $unit->setPower(820);
        $unit->setImg('/upload/units/marksman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////

        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(1);
        $unit->setName('rider_name');
        $unit->setTitle('rider_title');
        $unit->setDescription('rider_description');
        $unit->setAttack(11);
        $unit->setDefense(8);
        $unit->setHealthPoints(4);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(6);
        $unit->setUpkeep(21);
        $unit->setPower(100);
        $unit->setImg('/upload/units/rider.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(2);
        $unit->setName('light_cavalry_name');
        $unit->setTitle('light_cavalry_title');
        $unit->setDescription('light_cavalry_description');
        $unit->setAttack(15);
        $unit->setDefense(11);
        $unit->setHealthPoints(4);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(6);
        $unit->setUpkeep(42);
        $unit->setPower(140);
        $unit->setImg('/upload/units/light_cavalry.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(3);
        $unit->setName('heavy_cavalry_name');
        $unit->setTitle('heavy_cavalry_title');
        $unit->setDescription('heavy_cavalry_description');
        $unit->setAttack(20);
        $unit->setDefense(15);
        $unit->setHealthPoints(6);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(8);
        $unit->setUpkeep(62);
        $unit->setPower(190);
        $unit->setImg('/upload/units/heavy_cavalry.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(4);
        $unit->setName('mounted_archer_name');
        $unit->setTitle('mounted_archer_title');
        $unit->setDescription('mounted_archer_description');
        $unit->setAttack(32);
        $unit->setDefense(17);
        $unit->setHealthPoints(7);
        $unit->setRange(4);
        $unit->setSpeed(13);
        $unit->setLoad(8);
        $unit->setUpkeep(83);
        $unit->setPower(250);
        $unit->setImg('/upload/units/mounted_archer.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(5);
        $unit->setName('cavalry_shooter_name');
        $unit->setTitle('cavalry_shooter_title');
        $unit->setDescription('cavalry_shooter_description');
        $unit->setAttack(41);
        $unit->setDefense(22);
        $unit->setHealthPoints(9);
        $unit->setRange(4);
        $unit->setSpeed(13);
        $unit->setLoad(9);
        $unit->setUpkeep(104);
        $unit->setPower(320);
        $unit->setImg('/upload/units/cavalry_shooter.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(6);
        $unit->setName('knights_templar_name');
        $unit->setTitle('knights_templar_title');
        $unit->setDescription('knights_templar_description');
        $unit->setAttack(44);
        $unit->setDefense(32);
        $unit->setHealthPoints(11);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(9);
        $unit->setUpkeep(125);
        $unit->setPower(400);
        $unit->setImg('/upload/units/knights_templar.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(7);
        $unit->setName('heavy_cavalry_archer_name');
        $unit->setTitle('heavy_cavalry_archer_title');
        $unit->setDescription('heavy_cavalry_archer_description');
        $unit->setAttack(63);
        $unit->setDefense(34);
        $unit->setHealthPoints(13);
        $unit->setRange(4);
        $unit->setSpeed(13);
        $unit->setLoad(10);
        $unit->setUpkeep(146);
        $unit->setPower(490);
        $unit->setImg('/upload/units/heavy_cavalry.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(8);
        $unit->setName('royal_knight_name');
        $unit->setTitle('royal_knight_title');
        $unit->setDescription('royal_knight_description');
        $unit->setAttack(64);
        $unit->setDefense(47);
        $unit->setHealthPoints(15);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(10);
        $unit->setUpkeep(167);
        $unit->setPower(590);
        $unit->setImg('/upload/units/royal_knight.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(9);
        $unit->setName('strike_archer_name');
        $unit->setTitle('strike_archer_title');
        $unit->setDescription('strike_archer_description');
        $unit->setAttack(91);
        $unit->setDefense(49);
        $unit->setHealthPoints(18);
        $unit->setRange(4);
        $unit->setSpeed(13);
        $unit->setLoad(11);
        $unit->setUpkeep(188);
        $unit->setPower(700);
        $unit->setImg('/upload/units/strike_archer.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_CAVALRY);
        $unit->setLevel(10);
        $unit->setName('divine_knight_name');
        $unit->setTitle('divine_knight_title');
        $unit->setDescription('divine_knight_description');
        $unit->setAttack(90);
        $unit->setDefense(65);
        $unit->setHealthPoints(21);
        $unit->setRange(1);
        $unit->setSpeed(14);
        $unit->setLoad(11);
        $unit->setUpkeep(208);
        $unit->setPower(820);
        $unit->setImg('/upload/units/divine_knight.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(1);
        $unit->setName('militia_name');
        $unit->setTitle('militia_title');
        $unit->setDescription('militia_description');
        $unit->setAttack(6);
        $unit->setDefense(14);
        $unit->setHealthPoints(8);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(21);
        $unit->setPower(100);
        $unit->setImg('/upload/units/militia.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(2);
        $unit->setName('infantry_name');
        $unit->setTitle('infantry_title');
        $unit->setDescription('infantry_description');
        $unit->setAttack(8);
        $unit->setDefense(19);
        $unit->setHealthPoints(9);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(9);
        $unit->setUpkeep(42);
        $unit->setPower(140);
        $unit->setImg('/upload/units/infantry.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(3);
        $unit->setName('spearman_name');
        $unit->setTitle('spearman_title');
        $unit->setDescription('spearman_description');
        $unit->setAttack(22);
        $unit->setDefense(13);
        $unit->setHealthPoints(6);
        $unit->setRange(1);
        $unit->setSpeed(9);
        $unit->setLoad(10);
        $unit->setUpkeep(62);
        $unit->setPower(190);
        $unit->setImg('/upload/units/spearman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(4);
        $unit->setName('swordsman_name');
        $unit->setTitle('swordsman_title');
        $unit->setDescription('swordsman_description');
        $unit->setAttack(15);
        $unit->setDefense(35);
        $unit->setHealthPoints(15);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(10);
        $unit->setUpkeep(83);
        $unit->setPower(250);
        $unit->setImg('/upload/units/swordsman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(5);
        $unit->setName('pikeman_name');
        $unit->setTitle('pikeman_title');
        $unit->setDescription('pikeman_description');
        $unit->setAttack(38);
        $unit->setDefense(22);
        $unit->setHealthPoints(9);
        $unit->setRange(1);
        $unit->setSpeed(9);
        $unit->setLoad(11);
        $unit->setUpkeep(104);
        $unit->setPower(320);
        $unit->setImg('/upload/units/pikeman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(6);
        $unit->setName('noble_swordsman_name');
        $unit->setTitle('noble_swordsman_title');
        $unit->setDescription('noble_swordsman_description');
        $unit->setAttack(24);
        $unit->setDefense(56);
        $unit->setHealthPoints(22);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(11);
        $unit->setUpkeep(125);
        $unit->setPower(400);
        $unit->setImg('/upload/units/noble_swordsman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(7);
        $unit->setName('guard_name');
        $unit->setTitle('guard_title');
        $unit->setDescription('guard_description');
        $unit->setAttack(29);
        $unit->setDefense(68);
        $unit->setHealthPoints(26);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(12);
        $unit->setUpkeep(146);
        $unit->setPower(490);
        $unit->setImg('/upload/units/guard.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(8);
        $unit->setName('heavy_pikeman_name');
        $unit->setTitle('heavy_pikeman_title');
        $unit->setDescription('heavy_pikeman_description');
        $unit->setAttack(70);
        $unit->setDefense(41);
        $unit->setHealthPoints(15);
        $unit->setRange(1);
        $unit->setSpeed(9);
        $unit->setLoad(12);
        $unit->setUpkeep(167);
        $unit->setPower(590);
        $unit->setImg('/upload/units/heavy_pikeman.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(9);
        $unit->setName('halberdier_name');
        $unit->setTitle('halberdier_title');
        $unit->setDescription('halberdier_description');
        $unit->setAttack(84);
        $unit->setDefense(49);
        $unit->setHealthPoints(18);
        $unit->setRange(1);
        $unit->setSpeed(9);
        $unit->setLoad(13);
        $unit->setUpkeep(188);
        $unit->setPower(700);
        $unit->setImg('/upload/units/halberdier.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_INFANTRY);
        $unit->setLevel(10);
        $unit->setName('berserker_name');
        $unit->setTitle('berserker_title');
        $unit->setDescription('berserker_description');
        $unit->setAttack(49);
        $unit->setDefense(114);
        $unit->setHealthPoints(42);
        $unit->setRange(1);
        $unit->setSpeed(8);
        $unit->setLoad(13);
        $unit->setUpkeep(208);
        $unit->setPower(820);
        $unit->setImg('/upload/units/berserker.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(1);
        $unit->setName('bricole_name');
        $unit->setTitle('bricole_title');
        $unit->setDescription('bricole_description');
        $unit->setAttack(20);
        $unit->setDefense(9);
        $unit->setHealthPoints(5);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(15);
        $unit->setUpkeep(21);
        $unit->setPower(100);
        $unit->setImg('/upload/units/bricole.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(2);
        $unit->setName('assault_cart_name');
        $unit->setTitle('assault_cart_title');
        $unit->setDescription('assault_cart_description');
        $unit->setAttack(9);
        $unit->setDefense(14);
        $unit->setHealthPoints(8);
        $unit->setRange(1);
        $unit->setSpeed(5);
        $unit->setLoad(12);
        $unit->setUpkeep(42);
        $unit->setPower(140);
        $unit->setImg('/upload/units/assault_cart.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(3);
        $unit->setName('mangonel_name');
        $unit->setTitle('mangonel_title');
        $unit->setDescription('mangonel_description');
        $unit->setAttack(38);
        $unit->setDefense(17);
        $unit->setHealthPoints(7);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(16);
        $unit->setUpkeep(62);
        $unit->setPower(190);
        $unit->setImg('/upload/units/mangonel.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(4);
        $unit->setName('battering_ram_name');
        $unit->setTitle('battering_ram_title');
        $unit->setDescription('battering_ram_description');
        $unit->setAttack(17);
        $unit->setDefense(25);
        $unit->setHealthPoints(13);
        $unit->setRange(1);
        $unit->setSpeed(5);
        $unit->setLoad(13);
        $unit->setUpkeep(83);
        $unit->setPower(250);
        $unit->setImg('/upload/units/battering_ram.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(5);
        $unit->setName('heavy_mangonel_name');
        $unit->setTitle('heavy_mangonel_title');
        $unit->setDescription('heavy_mangonel_description');
        $unit->setAttack(64);
        $unit->setDefense(28);
        $unit->setHealthPoints(11);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(17);
        $unit->setUpkeep(104);
        $unit->setPower(320);
        $unit->setImg('/upload/units/heavy_mangonel.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(6);
        $unit->setName('demolisher_name');
        $unit->setTitle('demolisher_title');
        $unit->setDescription('demolisher_description');
        $unit->setAttack(28);
        $unit->setDefense(40);
        $unit->setHealthPoints(19);
        $unit->setRange(1);
        $unit->setSpeed(5);
        $unit->setLoad(15);
        $unit->setUpkeep(125);
        $unit->setPower(400);
        $unit->setImg('/upload/units/demolisher.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(7);
        $unit->setName('onager_name');
        $unit->setTitle('onager_title');
        $unit->setDescription('onager_description');
        $unit->setAttack(98);
        $unit->setDefense(44);
        $unit->setHealthPoints(16);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(18);
        $unit->setUpkeep(146);
        $unit->setPower(490);
        $unit->setImg('/upload/units/onager.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(8);
        $unit->setName('ballista_name');
        $unit->setTitle('ballista_title');
        $unit->setDescription('ballista_description');
        $unit->setAttack(118);
        $unit->setDefense(53);
        $unit->setHealthPoints(19);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(18);
        $unit->setUpkeep(167);
        $unit->setPower(590);
        $unit->setImg('/upload/units/ballista.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(9);
        $unit->setName('siege_tower_name');
        $unit->setTitle('siege_tower_title');
        $unit->setDescription('siege_tower_description');
        $unit->setAttack(49);
        $unit->setDefense(70);
        $unit->setHealthPoints(32);
        $unit->setRange(1);
        $unit->setSpeed(5);
        $unit->setLoad(17);
        $unit->setUpkeep(188);
        $unit->setPower(700);
        $unit->setImg('/upload/units/siege_tower.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////
        $unit = new Unit();
        $unit->setGroup(Unit::GROUP_ARMY);
        $unit->setType(Unit::TYPE_ROCKET);
        $unit->setLevel(10);
        $unit->setName('cannon_name');
        $unit->setTitle('cannon_title');
        $unit->setDescription('cannon_description');
        $unit->setAttack(164);
        $unit->setDefense(73);
        $unit->setHealthPoints(26);
        $unit->setRange(10);
        $unit->setSpeed(7);
        $unit->setLoad(19);
        $unit->setUpkeep(208);
        $unit->setPower(820);
        $unit->setImg('/upload/units/cannon.png');

        $manager->persist($unit);
        ////////////////////////////////////////////////////////////

        $manager->flush();
    }
}