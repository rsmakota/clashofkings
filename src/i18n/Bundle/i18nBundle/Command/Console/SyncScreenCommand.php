<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\Command\Console;

use i18n\Bundle\i18nBundle\Entity\Domain;
use i18n\Bundle\i18nBundle\Entity\Token;
use i18n\Bundle\i18nBundle\File\TwigFileManager;
use i18n\Bundle\i18nBundle\TokenParser\TokenParserInterface;
use i18n\Bundle\i18nBundle\TokenParser\TwigTokenParser;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use i18n\Bundle\i18nBundle\Service\i18nManager;

/**
 * Class SyncScreenCommand
 * This command find all language token in the twig files from all bundles of project and add them to DataBase
 *
 * @package Nebupay\Bundle\i18nBundle\Command\Console
 */
class SyncScreenCommand extends ContainerAwareCommand
{
    /**
     * @return TokenParserInterface
     */
    protected function getTwigParser()
    {
        return $this->getContainer()->get('np_i18n.twig_token_parser');
    }

    /**
     * @return i18nManager
     */
    protected function getLangManager()
    {
        return $this->getContainer()->get('np_i18n.manager');
    }

    /**
     * @return TwigFileManager
     */
    protected function getTwigFileManager()
    {
        return $this->getContainer()->get('np_i18n.twig_file_manager');
    }

    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('i18n:sync:src')
            ->setDescription('Finds language tokens and adds them to DataBase')
            ->setDefinition(
                array()
            )
            ->setHelp(<<<EOT
The <info>i18n:sync:src</info> command finds all language tokens in the twig files from all bundles of project and adds them to DataBase
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
        try {
            $files = $this->getTwigFileManager()->getAllFiles();
            $allTokens = array();
            foreach ($files as $filePath) {
                $content = file_get_contents($filePath);
                $parser = $this->getTwigParser();
                $result = $parser->parse($content);
                $allTokens = array_merge($allTokens, $result);
            }

            $this->getLangManager()->resetTokens();
            foreach ($allTokens as $domainName => $listTokens) {
                $domain = $this->getLangManager()->getDomain($domainName);
                foreach ($listTokens as $tokenName) {
                    $token = $this->getLangManager()->getToken($tokenName, $domain);
                    $token->setUsed(true);
                    $this->getLangManager()->update($token);
                }
            }
            $output->write(PHP_EOL . sprintf('Was found and updated<info> %s</info> tokens from <info>%s</info> files', count($listTokens), count($files)) . PHP_EOL);
        } catch (\Exception $e) {
            $output->write(PHP_EOL . sprintf('<error>Exception was occurred: %s, %s.</error>', $e->getCode(), $e->getMessage()) . PHP_EOL);
        }

    }
} 