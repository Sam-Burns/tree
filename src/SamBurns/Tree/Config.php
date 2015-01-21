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
     * @return array
     */
    public function toArray()
    {
        return $this->tree->toArray();
    }

    /**
     * @param array $arrayToMergeIn
     * @return Config
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
     * @param Config $config
     * @return Config
     */
    public function mergeWithConfig(Config $config)
    {
        return $this->mergeWithArray($config->toArray());
    }
}
