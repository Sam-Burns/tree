<?php
namespace SamBurns\Tree;

use SamBurns\Tree;

class BasicTree
{
    /** @var array */
    private $nodes;

    /**
     * @param array|null       $initialArray
     */
    public function __construct($initialArray = array())
    {
        $this->nodes = array();

        if ($initialArray) {

            foreach ($initialArray as $key => $initialArrayElement) {
                if (is_array($initialArrayElement)) {
                    $this->nodes[$key] = new static($initialArrayElement);
                } else {
                    $this->nodes[$key] = $initialArrayElement;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $arrayForm = array();

        foreach ($this->nodes as $key => $node) {
            if ($node instanceof Tree) {
                $arrayForm[$key] = $node->toArray();
            } else {
                $arrayForm[$key] = $node;
            }
        }

        return $arrayForm;
    }

    /**
     * @param array $arrayToMergeIn
     * @return Tree
     */
    public function mergeWithArray($arrayToMergeIn)
    {
        return new static(
            array_merge_recursive(
                $this->toArray(),
                $arrayToMergeIn
            )
        );
    }
}