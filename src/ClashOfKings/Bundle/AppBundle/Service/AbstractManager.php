<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace ClashOfKings\Bundle\AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class AbstractManager
 *
 * @package AppBundle\Service
 */
abstract class AbstractManager implements ManagerInterface
{
    protected $eManager;

    /**
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->eManager = $manager;
    }

    /**
     * @param array $params
     *
     * @return object
     */
    abstract public function create(array $params);

    /**
     * @param object $entity
     */
    public function update($entity)
    {
        $this->eManager->merge($entity);
        $this->eManager->flush();
    }

    /**
     * @param object $entity
     */
    public function remove($entity)
    {
        $this->eManager->remove($entity);
        $this->eManager->flush();
    }

    /**
     * @return string
     */
    abstract protected function getClassName();

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->eManager->getRepository($this->getClassName());
    }
}