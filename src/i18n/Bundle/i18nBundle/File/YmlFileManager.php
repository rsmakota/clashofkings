<?php
/**
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace i18n\Bundle\i18nBundle\File;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YmlFileManager
 *
 * @package Nebupay\Bundle\i18nBundle\File
 */
class YmlFileManager extends BaseFileManager
{
    /**
     * This method parse file/files and returns an array with structure 'token'=>'translate'
     * @param string $path - the path to file or directory with translations
     *
     * @return array
     * @throws \Exception
     */
    public function parse($path)
    {
        if (is_file($path)) {
            $file = new \SplFileInfo($path);

            return $this->parseFile($file);
        } elseif (is_dir($path)) {
            return $this->parseDirectory($path);
        } else {
            throw new \Exception('The path is wrong '.$path);
        }
    }

    /**
     * @param \SplFileInfo $file
     *
     * @return array
     * @throws \Exception
     */
    protected function parseFile(\SplFileInfo $file)
    {
        $translators = array();
        $fileName = explode('.', $file->getFilename()); //message.en.yml
        if (count($fileName) < 3) {
            throw new \Exception("The name of file is incorrect ($fileName)");
        }
        $translators[$fileName[0]][$fileName[1]] = Yaml::parse(file_get_contents($file->getRealPath()));

        return $translators;
    }

    /**
     * @param string $path
     *
     * @return array
     */
    protected function parseDirectory($path)
    {
        $finder = $this->getFinder()->in($path);
        $translates = array();
        /** @var $file \SplFileInfo */
        foreach ($finder as $file) {
            $translates = $this->mergeTranslates($translates, $this->parseFile($file));
        }

        return $translates;
    }

    /**
     * @param array $trans1
     * @param array $trans2
     *
     * @return array
     */
    protected function mergeTranslates(array $trans1, array $trans2)
    {
        $result = array();
        foreach ($trans1 as $key => $val) {
            if (array_key_exists($key, $trans2) && is_array($trans2[$key]) && is_array($val)) {
                $result[$key] = $this->mergeTranslates($val, $trans2[$key]);
            } elseif (array_key_exists($key, $trans2)) {
                $result[$key] = $trans2[$key];
            } else {
                $result[$key] = $val;
            }
        }

        foreach ($trans2 as $key => $val) {
            if (!array_key_exists($key, $trans1)) {
                $result[$key] = $val;
            }
        }

        return $result;
    }

    /**
     * @param array  $data
     * @param string $fileName
     * @param string $path
     *
     * @throws \Exception
     */
    public function createYmlFile($data, $fileName, $path)
    {
        $content = Yaml::dump($data);
        $this->getFileSystem()->exists($path.'/'.$fileName);
        $this->getFileSystem()->dumpFile($path.'/'.$fileName, $content);
    }

} 