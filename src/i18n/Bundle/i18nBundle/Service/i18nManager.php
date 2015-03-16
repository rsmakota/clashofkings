<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\Service;

use Doctrine\ORM\EntityManager;
use i18n\Bundle\i18nBundle\Entity\Domain;
use i18n\Bundle\i18nBundle\Entity\Language;
use i18n\Bundle\i18nBundle\Entity\Token;
use i18n\Bundle\i18nBundle\Entity\Translation;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class i18nManager
 *
 * @package Nebupay\Bundle\i18nBundle\Service
 */
class i18nManager
{
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param object $entity
     */
    public function update($entity)
    {
        $this->entityManager->merge($entity);
        $this->entityManager->flush();
    }

    /**
     * @param string $name
     * @param Domain $domain
     *
     * @return null|Token
     */
    public function findOneToken($name, $domain)
    {
        return $this->entityManager->getRepository(Token::clazz())->findOneBy(array('name' => $name, 'domain' => $domain));
    }

    /**
     * @param Token $token
     *
     * @return boolean
     */
    public function removeToken(Token $token)
    {
        $this->entityManager->remove($token);
        $this->entityManager->flush();

        return true;
    }

    /**
     * @param Translation $translate
     *
     * @return boolean
     */
    public function updateTranslate(Translation $translate)
    {
        $this->entityManager->merge($translate);
        $this->entityManager->flush();

        return true;
    }

    /**
     * @param string $name
     * @param Domain $domain
     *
     * @return array
     */
    public function findTokens($name, $domain)
    {
        return $this->entityManager->getRepository(Token::clazz())->findBy(array('name' => $name, 'domain' => $domain));
    }

    /**
     * @param Domain $domain
     *
     * @return array
     */
    public function findTokensByDomain($domain)
    {
        return $this->entityManager->getRepository(Token::clazz())->findBy(array('domain' => $domain));
    }

    /**
     * @param string $iso
     *
     * @return null|Language
     */
    public function findOneLanguageByName($iso)
    {
        return $this->entityManager->getRepository(Language::clazz())->findOneBy(array('iso' => $iso));
    }

    /**
     * @return array
     */
    public function findAllLanguage()
    {
        $languages = $this->entityManager->getRepository(Language::clazz())->findAll();
        $en = null;

        foreach ($languages as &$lang) {
            if ($lang->getIso() == 'en') {
                $en = $lang;
                unset($lang);
            }
        }

        if (null !== $en) {
            array_unshift($languages, $en);
        }

        return $languages;
    }

    /**
     * @param string $name
     *
     * @return null|Domain
     */
    public function findOneDomainByName($name)
    {
        return $this->entityManager->getRepository(Domain::clazz())->findOneBy(array('name' => $name));
    }

    public function findOneDomainById($id)
    {
        return $this->entityManager->getRepository(Domain::clazz())->findOneBy(array('id' => $id));
    }

    /**
     * @return array
     */
    public function findAllDomains()
    {
        return $this->entityManager->getRepository(Domain::clazz())->findAll();
    }

    /**
     * @param Token    $token
     * @param Language $language
     *
     * @return null|Translation
     */
    public function findOneTranslation($token, $language)
    {
        return $this->entityManager->getRepository(Translation::clazz())->findOneBy(array('token' => $token, 'language' => $language));
    }

    /**
     * @param string   $message
     * @param Token    $token
     * @param Language $language
     */
    public function addTranslation($message, $token, $language)
    {
        /** @var Translation $translation */
        $translation = $this->findOneTranslation($token, $language);
        if (null == $translation) {
            $translation = $this->createTranslation($message, $token, $language);
        }
        $translation->setMessage($message);
        $this->update($translation);
    }

    /**
     * This method finds existent Domain and if it can't find Domain then  this method creates new Domain
     *
     * @param string $name
     *
     * @return Domain
     */
    public function getDomain($name)
    {
        $domain = $this->findOneDomainByName($name);
        if (null == $domain) {
            $domain = $this->createDomain($name, $name);
        }

        return $domain;
    }

    /**
     * @param string $tokenName
     * @param Domain $domain
     * @param bool   $used
     * @param string $description
     *
     * @return Token
     */
    public function createToken($tokenName, $domain, $used, $description = '')
    {
        $token = new Token();
        $token->setName($tokenName);
        $token->setDomain($domain);
        $token->setUsed($used);
        $token->setDescription($description);

        $this->entityManager->persist($token);
        $this->entityManager->flush();

        return $token;
    }

    /**
     * @param string $name
     * @param string $description
     *
     * @return Domain
     */
    public function createDomain($name, $description)
    {
        $entity = new Domain();
        $entity->setName($name);
        $entity->setDescription($description);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * This method finds existent Language and if it can't find Language then  this method creates new Language
     *
     * @param string $iso
     *
     * @return Language
     */
    public function getLanguage($iso)
    {

        $lang = $this->findOneLanguageByName($iso);
        if (null == $lang) {
            $name = locale_get_display_language($iso . '-Latn-IT-nedis', 'en');
            $lang = $this->createLanguage($name, $iso);
        }

        return $lang;
    }

    /**
     * This method finds existent Token and if it can't find Token then this method creates new Token
     *
     * @param string $name
     * @param Domain $domain
     *
     * @return Token
     */
    public function getToken($name, $domain)
    {
        $token = $this->findOneToken($name, $domain);
        if (null == $token) {
            $token = $this->createToken($name, $domain, false, $name);
        }

        return $token;
    }

    /**
     * @param string $name
     * @param string $iso
     *
     * @return Language
     */
    public function createLanguage($name, $iso)
    {
        $entity = new Language();
        $entity->setName($name);
        $entity->setIso($iso);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * @param string   $mess
     * @param Token    $token
     * @param Language $lang
     *
     * @return Translation
     */
    public function createTranslation($mess, Token $token, Language $lang)
    {
        $entity = new Translation();
        $entity->setMessage($mess);
        $entity->setToken($token);
        $entity->setLanguage($lang);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * Resets all parameters for column used
     */
    public function resetTokens()
    {
        $queryBuild = $this->entityManager->createQueryBuilder();
        $query = $queryBuild->update(Token::clazz(), 't')->set('t.used', ':used')->setParameter('used', false)->getQuery();
        $query->execute();
    }

    /**
     * @param array $translation
     */
    public function importTranslation(array $translation)
    {
        foreach ($translation as $domainName => $arrLocales) {
            $domain = $this->getDomain($domainName);
            foreach ($arrLocales as $iso => $arrTokens) {
                $language = $this->getLanguage($iso);
                foreach ($arrTokens as $tokenName => $message) {
                    $token = $this->getToken($tokenName, $domain);
                    $this->addTranslation($message, $token, $language);
                }
            }
        }
    }

    /**
     * @param Domain   $domain
     * @param Language $language
     *
     * @return array
     */
    public function getTokenTranslateArray(Domain $domain, Language $language)
    {
        $result = array();
        /** @var $token Token */
        $tokens = $this->entityManager->getRepository(Token::clazz())->findBy(array('domain' => $domain), array('name'=>'ASC'));
        foreach ($tokens as $token) {
            $translate = $this->findOneTranslation($token, $language);
            if (null != $translate) {
                $result[$token->getName()] = $translate->getMessage();
            }
        }

        return $result;
    }

    /**
     * @param integer $domainId
     *
     * @return array
     */
    public function getTokensByDomainId($domainId)
    {
        $domain = $this->findOneDomainById($domainId);

        return $this->entityManager->getRepository(Token::clazz())->findBy(array('domain' => $domain));
    }
} 