<?php
namespace SamBurns\Tree;

class BasicTree implements Tree, ArrayableTree
{
    /** @var array */
    private $nodes = array();

    /**
     * @param array|null $initialArray
     */
    public function __construct($initialArray = array())
    {
        $this->populateFromArray($initialArray);
    }

    /**
     * Clobbers original array
     *
     * @param array|null $arrayToPopulateFrom
     */
    public function populateFromArray($arrayToPopulateFrom)
    {
        $this->nodes = array();

        foreach ($arrayToPopulateFrom as $key => $arrayElement) {
            if (is_array($arrayElement)) {
                $this->nodes[$key] = new static($arrayElement);
            } else {
                $this->nodes[$key] = $arrayElement;
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
     * Incoming array takes precedence in the event of key clashes
     *
     * @param array $arrayToMergeIn
     */
    public function mergeInArray($arrayToMergeIn)
    {
        $mergedArray = array_replace_recursive(
            $this->toArray(),
            $arrayToMergeIn
        );
        $this->populateFromArray($mergedArray);
    }

    /**
     * Incoming tree takes precedence in the event of key clashes
     *
     * @param ArrayableTree $treeToMergeIn
     * @return Tree
     */
    public function mergeInTree(ArrayableTree $treeToMergeIn)
    {
        $this->mergeInArray($treeToMergeIn->toArray());
    }

    /**
     * @param  string $nodeKey
     * @return mixed
     */
    public function get($nodeKey)
    {
        if (!isset($this->nodes[$nodeKey])) {
            return null;
        }

        return $this->nodes[$nodeKey];
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        if (is_array($value)) {
            $this->nodes[$key] = new static($value);
        }
        $this->nodes[$key] = $value;
    }

    /**
     * @param  string $slashDelimitedPath
     * @return mixed
     */
    public function getFromPath($slashDelimitedPath)
    {
        $settingsHierarchy = explode('/', $slashDelimitedPath);

        $currentConfig = $this;

        foreach ($settingsHierarchy as $settingName) {
            if (!$currentConfig instanceof Tree) {
                return null;
            }

            $currentConfig = $currentConfig->get($settingName);
        }

        return $currentConfig;
    }
}
