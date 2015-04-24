<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;

/**
 * Class UnitGroup
 *
 * @package ClashOfKings\Bundle\AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="unit_groups")
 */
class UnitGroup
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
    static public function clazz()
    {
        return get_called_class();
    }

}