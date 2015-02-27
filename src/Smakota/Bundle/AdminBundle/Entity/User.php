<?php
/**
 *  @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Smakota\Bundle\AdminBundle\Entity;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use \Doctrine\ORM\Mapping as Orm;
/**
 * Class Building
 *
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     */
    protected $username;
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $password;

    /**
     * @ORM\Column(type="json_array")
     */
    protected $roles;
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $salt;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

}