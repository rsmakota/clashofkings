<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\File;


use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class BaseFileManager
{
    protected $finder;

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * @param Finder $finder
     */
    public function setFinder(Finder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @return Finder
     */
    public function getFinder()
    {
        if (null == $this->finder) {
            $this->finder = new Finder();
        }

        return $this->finder;
    }


    /**
     * @return Filesystem
     */
    public function getFileSystem()
    {
        if (null == $this->fileSystem) {
            $this->fileSystem = new Filesystem();
        }

        return $this->fileSystem;
    }
} 