<?php
/** 
 * @copyright 2014 Nebupay LLC
 * @author Rodion Smakota <rsmakota@nebupay.com>
 */

namespace i18n\Bundle\i18nBundle\Command\Console;


use Nebupay\Bundle\i18nBundle\Entity\Domain;
use Nebupay\Bundle\i18nBundle\Entity\Language;
use Nebupay\Bundle\i18nBundle\File\TwigFileManager;
use Nebupay\Bundle\i18nBundle\File\YmlFileManager;
use Nebupay\Bundle\i18nBundle\Service\i18nManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LangFileCompileCommand
 *
 * @package Nebupay\Bundle\i18nBundle\Command\Console
 */
class LangFileCompileCommand extends ContainerAwareCommand
{

    protected $path;
    /**
     * @return i18nManager
     */
    protected function getLangManager()
    {
        return $this->getContainer()->get('np_i18n.manager');
    }

    /**
     * @return YmlFileManager
     */
    protected function getYmlManager()
    {
        return $this->getContainer()->get('np_i18n.yaml_manager');
    }

    /**
     * @return TwigFileManager
     */
    protected function getTwigFileManager()
    {
        return $this->getContainer()->get('np_i18n.twig_file_manager');
    }

    protected function getPath()
    {
        if (!empty($this->path)) {
            return $this->path;
        }

        return $this->getContainer()->getParameter('kernel.root_dir').'/Resources/translations';

    }
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('i18n:compile')
            ->setDescription('Creates translation files by path ')
            ->addOption(
                'path',
                null,
                InputOption::VALUE_REQUIRED,
                'This is a full and normalised path to directory where will create translation files.',
                null
            )
            ->setHelp(<<<EOT
The <info>i18n:compile</info> creates files with translation messages. The translation messages from DataBase.
The <info>path</info> should be full and normalised --path=<comment>/var/www/project/app/translation</comment>.
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
        $this->path = $input->getOption('path');
        $domains = $this->getLangManager()->findAllDomains();
        $languages = $this->getLangManager()->findAllLanguage();
        $count = 0;
        try {
            /**
             * @var $domain   Domain
             * @var $language Language
             */
            foreach ($domains as $domain) {
                foreach ($languages as $language) {
                    $fileName = $domain->getName().'.'.$language->getIso().'.yml';
                    $tokenTransArr = $this->getLangManager()->getTokenTranslateArray($domain, $language);
                    $this->getYmlManager()->createYmlFile($tokenTransArr, $fileName, $this->getPath());
                    $count ++;
                }
            }
            $output->write(PHP_EOL . sprintf('Ok. Were created <info>%s</info> files by path <comment>%s</comment>', $count, $this->getPath()) . PHP_EOL);
        } catch(\Exception $e) {
            $output->write(PHP_EOL . sprintf('<error>Exception was occurred: %s, %s.</error>', $e->getCode(), $e->getMessage()) . PHP_EOL);
        }
    }
} 