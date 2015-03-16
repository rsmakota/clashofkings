<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;

/**
 * Class Language
 * @package i18n\Bundle\i18nBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="i18n_language")
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=2, options={"fixed" = true})
     */
    protected $iso;

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
     * @param string $iso
     */
    public function setIso($iso)
    {
        $this->iso = $iso;
    }

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public static function clazz()
    {
        return get_called_class();
    }
} 