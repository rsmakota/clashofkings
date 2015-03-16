<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace ClashOfKings\Bundle\AppBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;

/**
 * Class Building
 *
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="buildings")
 */
class Building 
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
     * @ORM\Column(type="string", length=32)
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="text")
     */
    private $remark;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * @return string
     */
    static public function clazz()
    {
        return get_called_class();
    }

}