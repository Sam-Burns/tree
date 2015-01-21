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
}
