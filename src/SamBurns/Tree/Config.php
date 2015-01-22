<?php
namespace SamBurns\Tree;

use SamBurns\Tree;
use SamBurns\Tree\FileParsing\FileFactory;
use SamBurns\Tree\FileParsing\File\Exception\CannotParseFileType;
use SamBurns\Tree\FileParsing\File\Exception\FileDoesNotExist;

class Config implements Tree, ConfigFromFile
{
    /** @var BasicTree */
    private $tree;

    /** @var FileFactory */
    private $fileFactory;

    /**
     * @param FileFactory|null $fileFactory
     */
    public function __construct(FileFactory $fileFactory = null)
    {
        $this->fileFactory = $fileFactory ?: new FileFactory();
    }

    /**
     * @param array $arrayToPopulateWith
     */
    public function populateFromArray($arrayToPopulateWith)
    {
        $this->tree->mergeWithArray($arrayToPopulateWith);
    }

    /**
     * @param BasicTree $basicTree
     * @return Config
     */
    private static function constructFromBasicTree(BasicTree $basicTree)
    {
        $newConfig = new static();
        $newConfig->setBasicTree($basicTree);
        return $newConfig;
    }

    /**
     * @param BasicTree $basicTree
     */
    private function setBasicTree(BasicTree $basicTree)
    {
        $this->tree = $basicTree;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->tree->toArray();
    }

    /**
     * @param array $arrayToMergeIn
     * @return ConfigFromFile
     */
    public function mergeWithArray($arrayToMergeIn)
    {
        $this->tree = $this->tree->mergeWithArray($arrayToMergeIn);
        return $this;
    }

    /**
     * @throws CannotParseFileType
     * @throws FileDoesNotExist
     *
     * @param string $path
     */
    public function populateFromFile($path)
    {
        $file = $this->fileFactory->getFile($path);
        $this->tree = new BasicTree($file->toArray());
    }

    /**
     * @param ConfigFromFile $config
     * @return ConfigFromFile
     */
    public function mergeWithConfig(ConfigFromFile $config)
    {
        return $this->mergeWithArray($config->toArray());
    }

    /**
     * @param  string $nodeKey
     * @return mixed
     */
    public function get($nodeKey)
    {
        $valueInTree = $this->tree->get($nodeKey);
        if ($valueInTree instanceof BasicTree) {
            return static::constructFromBasicTree($valueInTree);
        }
        return $valueInTree;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        $this->tree->set($key, $value);
    }

    /**
     * @param  string $slashDelimitedPath
     * @return mixed
     */
    public function getFromPath($slashDelimitedPath)
    {
        $valueInTree = $this->tree->getFromPath($slashDelimitedPath);
        if ($valueInTree instanceof BasicTree) {
            return static::constructFromBasicTree($valueInTree);
        }
        return $valueInTree;
    }
}
