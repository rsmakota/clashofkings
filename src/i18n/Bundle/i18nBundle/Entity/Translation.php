<?php
/** 
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\Entity;

use \Doctrine\ORM\Mapping as Orm;
/**
 * Class Token
 *
 * @package i18n\Bundle\i18nBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="i18n_translation")
 */
class Translation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $message;

    /**
     * @ORM\ManyToOne(targetEntity="i18n\Bundle\i18nBundle\Entity\Token", fetch="EAGER", inversedBy="translations")
     */
    protected $token;

    /**
     * @ORM\ManyToOne(targetEntity="i18n\Bundle\i18nBundle\Entity\Language", fetch="EAGER")
     */
    protected $language;

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Language $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Token $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public static function clazz()
    {
        return get_called_class();
    }
}