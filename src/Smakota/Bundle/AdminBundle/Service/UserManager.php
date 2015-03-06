<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Smakota\Bundle\AdminBundle\Service;


use Doctrine\ORM\EntityManager;
use Smakota\Bundle\AdminBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

/**
 * Class UserManager
 *
 * @package Smakota\Bundle\AdminBundle\Service
 */
class UserManager {

    protected $eManager;

    /**
     * @param EntityManager $eManager
     */
    public function __construct(EntityManager $eManager)
    {
        $this->eManager = $eManager;
    }

    /**
     * @return EntityManager
     */
    protected function getEManager()
    {
        return $this->eManager;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setRoles($data['roles']);
        $user->setSalt(md5(time()));
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($data['password'], $user->getSalt());
        $user->setPassword($password);

        $this->eManager->persist($user);
        $this->eManager->flush();

        return $user;
    }
}