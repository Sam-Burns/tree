<?php
namespace SamBurns\Tree;

use SamBurns\Tree;
use SamBurns\Tree\FileParsing\FileFactory;

class Config implements Tree, ConfigFromFile
{
    /** @var BasicTree */
    private $tree;

    /** @var FileFactory */
    private $fileFactory;

    /**
     * @param FileFactory $fileFactory
     */
    public function __construct(FileFactory $fileFactory)
    {
        $this->fileFactory = $fileFactory;
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

    public function populateFromFile($argument1)
    {
        // TODO: write logic here
    }
}
