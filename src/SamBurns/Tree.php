<?php
namespace SamBurns;

use SamBurns\Tree\File\FileFactory;

class Tree
{
    /** @var array */
    private $nodes;

    /** @var FileFactory */
    private $fileFactory;

    /**
     * @param array|null       $initialArray
     * @param FileFactory|null $fileFactory
     */
    public function __construct($initialArray = array(), FileFactory $fileFactory = null)
    {
        $this->fileFactory = $fileFactory ?: new FileFactory();

        $this->nodes = array();

        if ($initialArray) {

            foreach ($initialArray as $key => $initialArrayElement) {
                if (is_array($initialArrayElement)) {
                    $this->nodes[$key] = new Tree($initialArrayElement, $fileFactory);
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
        return new Tree(
            array_merge_recursive(
                $this->toArray(),
                $arrayToMergeIn
            )
        );
    }
}
