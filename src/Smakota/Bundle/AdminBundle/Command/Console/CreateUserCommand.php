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
use Smakota\Bundle\AdminBundle\Service\UserManager;

/**
 * Class CreateUserCommand
 *
 * @package Smakota\Bundle\AdminBundle\Command\Console
 */
class CreateUserCommand extends ContainerAwareCommand
{
    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        return $this->getContainer()->get('smakota_admin.user_manager');
    }

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
            ->addArgument('email', InputArgument::REQUIRED, 'E-mail of user')
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
        $data = [
            'username' => $input->getArgument('username'),
            'password' => $input->getArgument('password'),
            'email'    => $input->getArgument('email'),
            'roles'    => $input->getArgument('roles')
        ];
        try {
            $user = $this->getUserManager()->create($data);
            $output->write('<info>User was created and has id = "'.$user->getId().'"</info>'.PHP_EOL);
        } catch (\Exception $e) {
            $output->write('<error>'.$e->getMessage().'</error>');
        }
    }

}