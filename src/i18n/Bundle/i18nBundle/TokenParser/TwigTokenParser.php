<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\TokenParser;

use Symfony\Bridge\Twig\Node\TransNode;

/**
 * Class TwigTokenParser
 *
 * @package Nebupay\Bundle\i18nBundle\TokenParser
 */
class TwigTokenParser implements TokenParserInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twig;
    /**
     * @var array
     */
    private $tokens = array();
    /**
     * @var string
     */
    protected $defaultDomain = 'messages';
    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param string $content
     *
     * @return array
     */
    public function parse($content)
    {
        $nodes = $this->twig->parse($this->twig->tokenize($content));
        $this->parseNode($nodes);

        return $this->tokens;
    }

    /**
     * @param \Twig_Node $node
     */
    protected function parseNode(\Twig_Node $node)
    {
        if (($node instanceof TransNode) && (!$node->getNode('body') instanceof \Twig_Node_Expression_GetAttr)) {
            // trans block
            $message = $node->getNode('body')->getAttribute('data');
            $this->addToken($this->defaultDomain, $message, $message);
        } elseif ($node instanceof \Twig_Node_Print) {
            // trans filter (be careful of how you chain your filters)
            $message = $this->extractMessage($node->getNode('expr'));
            $domain = $this->defaultDomain;
            if (($message !== null) && ($domain !== null)) {
                $this->addToken($domain, $message, $message);
            }
        } else {
            // continue crawling
            foreach ($node as $child) {
                if ($child != null) {
                    $this->parseNode($child);
                }
            }
        }
    }

    protected function addToken($domain, $token, $translation)
    {
        if (!isset($this->tokens[$domain])) {
            $this->tokens[$domain] = array();
        }

        $this->tokens[$domain][$token] = $translation;
    }

    protected function extractMessage(\Twig_Node $node)
    {
        if ($node->hasNode('node')) {
            return $this->extractMessage($node->getNode('node'));
        }
        if ($node instanceof \Twig_Node_Expression_Constant) {
            return $node->getAttribute('value');
        }

        return null;
    }
}