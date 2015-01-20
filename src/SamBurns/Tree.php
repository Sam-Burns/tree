<?php
namespace SamBurns;

interface Tree
{
    /**
     * @return array
     */
    public function toArray();

    /**
     * @param array $arrayToMergeIn
     * @return Tree
     */
    public function mergeWithArray($arrayToMergeIn);
}
