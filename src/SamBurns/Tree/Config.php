<?php
namespace SamBurns\Tree;

use SamBurns\Tree;

class Config implements Tree, ConfigTree
{
    /** @var BasicTree */
    private $tree;

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
}
