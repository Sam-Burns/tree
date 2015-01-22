<?php
namespace SamBurns\Tree;

interface ArrayableTree extends Tree
{
    /**
     * @return array
     */
    public function toArray();
}
