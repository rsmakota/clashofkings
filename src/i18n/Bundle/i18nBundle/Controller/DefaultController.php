<?php

namespace i18n\Bundle\i18nBundle\Controller;

use i18n\Bundle\i18nBundle\Entity\Language;
use i18n\Bundle\i18nBundle\Entity\Token;
use i18n\Bundle\i18nBundle\Service\i18nManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 *
 * @package Nebupay\Bundle\i18nBundle\Controller
 */
class DefaultController extends Controller
{
    private function geti18nManager()
    {
        return $this->get('np_i18n.manager');
    }

    private function formatDomainsItems($items)
    {
        $result = array();

        foreach ($items as $value) {
            $result[] = array(
                'id'   => $value->getId(),
                'name' => $value->getName()
            );
        }

        return $result;
    }

    private function formatLangsItems($items)
    {
        $result = array();

        foreach ($items as $value) {
            $result[] = array(
                'id'    => $value->getIso(),
                'title' => $value->getName()
            );
        }

        return $result;
    }

    /**
     * @Remote
     */
    public function readAction($params)
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();

        $result = array();
        $langs = $manager->findAllLanguage();
        $tokens = $manager->getTokensByDomainId($params['domain']);

        $index = 0;

        /** @var Token $token */
        foreach ($tokens as $token) {
            $result[$index] = array(
                'id'   => $token->getName(),
                'name' => $token->getDescription(),
                'used' => $token->getUsed()
            );
            /** @var Language $lang */
            foreach ($langs as $lang) {
                $translate = $manager->findOneTranslation($token, $lang);
                if (null !== $translate) {
                    $result[$index][$lang->getIso()] = $translate->getMessage();
                } else {
                    $result[$index][$lang->getIso()] = '';
                }
            }

            $index++;
        }

        return $result;
    }

    /**
     * @Remote
     */
    public function updateAction($params)
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();
        $domain = $manager->findOneDomainByName($params['domain']);
        $token = $manager->findOneToken($params['token'], $domain);

        unset($params['token']);
        unset($params['domain']);

        foreach ($params as $iso => $message) {
            $lang = $manager->findOneLanguageByName($iso);
            $translate = $manager->findOneTranslation($token, $lang);
            if (null !== $translate) {
                $translate->setMessage($message);
                $manager->updateTranslate($translate);
            } else {
                $manager->createTranslation($message, $token, $lang);
            }
        }

        return array('success' => true);
    }

    /**
     * @Remote
     */
    public function removeAction($params)
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();
        $domain = $manager->findOneDomainByName($params['domain']);
        $token = $manager->findOneToken($params['token'], $domain);
        $result = false;

        if (null !== $token) {
            $result = $manager->removeToken($token);
        }

        return array('success' => $result);
    }

    /**
     * @Remote
     */
    public function getHeadersAction()
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();

        $langs = $manager->findAllLanguage();

        return $this->formatLangsItems($langs);
    }

    /**
     * @Remote
     */
    public function domainAction()
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();

        $domains = $manager->findAllDomains();

        return $this->formatDomainsItems($domains);
    }

    /**
     * @Remote
     */
    public function getTokenAction($params)
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();
        $langs = $manager->findAllLanguage();
        $result = array();

        $index = 0;

        foreach ($langs as $lang) {
            $domain = $manager->findOneDomainByName($params['domain']);
            $token = $manager->findOneToken($params['token'], $domain);
            $translate = $manager->findOneTranslation($token, $lang);

            if (null !== $translate) {
                $result[$index] = array(
                    'id'    => $lang->getIso(),
                    'title' => $lang->getName(),
                    'value' => $translate->getMessage()
                );
            } else {
                $result[$index] = array(
                    'id'    => $lang->getIso(),
                    'title' => $lang->getName(),
                    'value' => ''
                );
            }

            $index++;
        }

        return $result;
    }

    /**
     * @Remote
     */
    public function getDefaultDomainAction()
    {
        /** @var i18nManager $manager */
        $manager = $this->geti18nManager();
        $domains = $manager->findAllDomains();

        return array('domain' => $domains[0]->getId());
    }
}
