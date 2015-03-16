<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace ClashOfKings\Bundle\AppBundle\Service;


interface ManagerInterface
{
    public function create(array $params);

    public function update($entity);

    public function remove($entity);
}