<?php
namespace SamBurns\Tree;

use SamBurns\Tree\FileParsing\File\Exception\CannotParseFileType;
use SamBurns\Tree\FileParsing\File\Exception\FileDoesNotExist;

interface ConfigTreeFromFile extends Tree, ArrayableTree
{
    /**
     * @throws CannotParseFileType
     * @throws FileDoesNotExist
     *
     * @param string $path
     */
    public function populateFromFile($path);
}
