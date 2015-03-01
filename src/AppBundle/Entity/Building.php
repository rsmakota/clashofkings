<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 clash-of-kings.org
 */

namespace AppBundle\Entity;

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


}