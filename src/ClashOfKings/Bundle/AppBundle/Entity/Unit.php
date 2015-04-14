<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;

/**
 * Class Unit
 * @package ClashOfKings\Bundle\AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="units")
 */
class Unit
{

    const GROUP_ARMY    = 1;
    const GROUP_MONSTER = 2;

    const TYPE_ARCHER   = 1;
    const TYPE_INFANTRY = 2;
    const TYPE_CAVALRY  = 3;
    const TYPE_ROCKET   = 4;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=32, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $img;

    /**
     * @ORM\Column(type="integer")
     */
    private $attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $defense;
    /**
     * @ORM\Column(type="integer", name="health_points")
     */
    private $healthPoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $range;
    /**
     * @ORM\Column(type="integer")
     */
    private $speed;
    /**
     * @ORM\Column(type="integer")
     */
    private $load;
    /**
     * @ORM\Column(type="integer")
     */
    private $upkeep;
    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="integer", name="unit_group_id")
     */
    private $unitGroup;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }/**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }/**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @param mixed $attack
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * @return mixed
     */
    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    /**
     * @param mixed $healthPoints
     */
    public function setHealthPoints($healthPoints)
    {
        $this->healthPoints = $healthPoints;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param mixed $range
     */
    public function setRange($range)
    {
        $this->range = $range;
    }

    /**
     * @return mixed
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param mixed $load
     */
    public function setLoad($load)
    {
        $this->load = $load;
    }

    /**
     * @return mixed
     */
    public function getUpkeep()
    {
        return $this->upkeep;
    }

    /**
     * @param mixed $upkeep
     */
    public function setUpkeep($upkeep)
    {
        $this->upkeep = $upkeep;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->unitGroup;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->unitGroup = $group;
    }
    /**
     * @return string
     */
    static public function clazz()
    {
        return get_called_class();
    }
}