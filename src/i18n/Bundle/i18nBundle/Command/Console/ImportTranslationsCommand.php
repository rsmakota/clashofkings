<?php
/** 
 * @copyright 2014 Nebupay LLC
 * @author Rodion Smakota <rsmakota@nebupay.com>
 */

namespace i18n\Bundle\i18nBundle\Command\Console;


use Nebupay\Bundle\i18nBundle\File\YmlFileManager;
use Nebupay\Bundle\i18nBundle\Service\i18nManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportTranslationsCommand
 * This command finds translations from files by given path
 *
 * @package Nebupay\Bundle\i18nBundle\Command\Console
 */
class ImportTranslationsCommand extends ContainerAwareCommand
{
    /**
     * @return YmlFileManager
     */
    protected function getYmlManager()
    {
        return $this->getContainer()->get('np_i18n.yaml_manager');
    }

    /**
     * @return i18nManager
     */
    protected function getLangManager()
    {
        return $this->getContainer()->get('np_i18n.manager');
    }

    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('i18n:import:translations')
            ->setDescription('Import translations to the DataBase')
            ->setDefinition(array(
                    new InputArgument('path', InputArgument::REQUIRED, 'It is a full and normalised path to files with translation messages.')
                ))
            ->setHelp(<<<EOT
The <info>i18n:import:translations</info> finds files with translation messages.
The <info>path</info> should be full and normalised and file names should be like this <info>messages.en.yml</info>
    where:
        <comment>messages</comment> - domain
        <comment>en</comment>       - iso name of language(en, de, fr, es, ...)
        <comment>yml</comment>      - extension of file, files should have an yaml format

EOT
            );
    }

    /**
     * @param array $trans
     *
     * @return int
     */
    protected function countTranslations(array $trans)
    {
        $count = 0;
        foreach ($trans as $value) {
            if (!is_array($value)) {
                $count++;
            } else {
                $count += $this->countTranslations($value);
            }
        }

        return $count;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');

        try {
            $translations = $this->getYmlManager()->parse($path);
            if (empty($translations)) {
                throw new \Exception("We can't find translations by this path $path");
            }
            $this->getLangManager()->importTranslation($translations);
            $output->write(PHP_EOL . sprintf('Ok. Were found and added <info>%s</info> translations', $this->countTranslations($translations)) . PHP_EOL);
        } catch(\Exception $e) {
            $output->write(PHP_EOL . sprintf('<error>Exception was occurred: %s, %s.</error>', $e->getCode(), $e->getMessage()) . PHP_EOL);
        }
    }

} 