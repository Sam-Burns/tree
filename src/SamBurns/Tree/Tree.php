<?php
namespace SamBurns\Tree;

use SamBurns\Tree\ArrayableTree;

interface Tree
{
    /**
     * @param  string $nodeKey
     * @return mixed
     */
    public function get($nodeKey);

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value);

    /**
     * @param  string $slashDelimitedPath
     * @return mixed
     */
    public function getFromPath($slashDelimitedPath);

    /**
     * Incoming tree takes precedence in the event of key clashes
     *
     * @param ArrayableTree $treeToMergeIn
     * @return Tree
     */
    public function mergeInTree(ArrayableTree $treeToMergeIn);

    /**
     * Incoming array takes precedence in the event of key clashes
     *
     * @param array $arrayToMergeIn
     */
    public function mergeInArray($arrayToMergeIn);

    /**
     * Clobbers original array
     *
     * @param array|null $arrayToPopulateFrom
     */
    public function populateFromArray($arrayToPopulateFrom);
}
