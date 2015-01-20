<?php
namespace SamBurns\Tree;

interface ConfigTree
{
    /**
     * @return array
     */
    public function toArray();

    /**
     * @param array $arrayToMergeIn
     * @return ConfigTree
     */
    public function mergeWithArray($arrayToMergeIn);
}
