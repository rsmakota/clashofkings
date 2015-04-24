<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use \Doctrine\ORM\Mapping as Orm;

/**
 * Class UnitType
 *
 * @package ClashOfKings\Bundle\AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="unit_types")
 */
class UnitType
{
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
     * @ORM\ManyToOne(targetEntity="UnitGroup")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="type")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $units;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    /**
     * @return Unit[]
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return UnitGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param UnitGroup $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    static public function clazz()
    {
        return get_called_class();
    }

}