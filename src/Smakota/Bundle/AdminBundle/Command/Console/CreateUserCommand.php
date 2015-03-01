<?php
/**
 * Created by PhpStorm.
 * User: rodion
 * Date: 01.03.15
 * Time: 18:17
 */

namespace Smakota\Bundle\AdminBundle\Command\Console;


use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 *
 * @package Smakota\Bundle\AdminBundle\Command\Console
 */
class CreateUserCommand extends ContainerAwareCommand
{
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('admin:service:createUser')
            ->setDescription('Create User')
            ->addArgument('username', InputArgument::REQUIRED, 'Username of user')
            ->addArgument('password', InputArgument::REQUIRED, 'Password of user')
            ->addArgument('roles', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'Users\'s roles')
            ->setHelp(<<<EOT
The <info>admin:service:createUser</info> create site User.
Ureadmin:service:createUser bob yhfg4Sd --roles='ROLE_ADMIN, ROLE_USER'
EOT
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $roles    = str_replace(' ', '', $input->getOption('roles'));
        $roles    = explode(',', $roles);

    }

}