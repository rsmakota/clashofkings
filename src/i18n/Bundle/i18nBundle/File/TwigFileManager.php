<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\File;

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class TwigFileManager
 *
 * @package Nebupay\Bundle\i18nBundle\File
 */
class TwigFileManager extends BaseFileManager
{

    protected $path;

    protected $bundlesList;
    /**
     * @var Kernel
     */
    protected $kernel;

    /**
     * @param string $path
     * @param Kernel $kernel
     */
    public function __construct($path, Kernel $kernel)
    {
        $this->path = realpath($path);
        $this->kernel = $kernel;
    }

    /**
     * @return array
     */
    public function getAllFiles()
    {
        $filesTwig = array();
        $bundles = $this->kernel->getBundles();
        /**
         * @var $bundle Bundle
         * @var $file    \Symfony\Component\Finder\SplFileInfo
         */
        foreach ($bundles as $bundle) {
            if (stristr($bundle->getPath(), $this->path) !== false) {
                foreach ($this->getFinder()->files()->in($bundle->getPath())->name('*.html.twig') as $file) {
                    $filesTwig[] = $file->getRealPath();
                }
            }
            $bundle->getPath();
        }

        return $filesTwig;
    }
} 