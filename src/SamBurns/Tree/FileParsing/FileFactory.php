<?php
namespace SamBurns\Tree\FileParsing;

use SamBurns\Tree\FileParsing\File\JsonFile;

class FileFactory
{
    /**
     * @param string $path
     * @return File
     */
    public function getFile($path)
    {
        return new JsonFile($path);
    }
}
