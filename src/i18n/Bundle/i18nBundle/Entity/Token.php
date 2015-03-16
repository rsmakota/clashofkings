<?php
/** 
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;
/**
 * Class Token
 *
 * @package Nebupay\Bundle\i18nBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="i18n_token")
 */
class Token
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $description = '';

    /**
     * @ORM\ManyToOne(targetEntity="i18n\Bundle\i18nBundle\Entity\Domain", fetch="EAGER")
     */
    protected $domain;

    /**
     * @ORM\OneToMany(targetEntity="i18n\Bundle\i18nBundle\Entity\Translation", mappedBy="token", cascade={"remove"})
     */
    protected $translations;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $used = false;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Domain $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param boolean $used
     */
    public function setUsed($used)
    {
        $this->used = $used;
    }

    /**
     * @return boolean
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * @return string
     */
    public static function clazz()
    {
        return get_called_class();
    }
} 