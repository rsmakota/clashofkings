<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\TokenParser;

/**
 * Interface TokenParserInterface
 *
 * @package Nebupay\Bundle\i18nBundle\TokenParser
 */
interface TokenParserInterface
{
    /**
     * @param string $content
     *
     * @return array
     */
    public function parse($content);
} 