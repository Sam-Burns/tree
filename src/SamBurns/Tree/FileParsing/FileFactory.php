<?php
namespace SamBurns\Tree\FileParsing;

use SamBurns\Tree\FileParsing\File\JsonFile;
use SamBurns\Tree\FileParsing\File\PhpArrayFile;

class FileFactory
{
    /**
     * @param string $path
     * @return File
     */
    public function getFile($path)
    {
        $pathInfo = pathinfo($path);

        switch ($pathInfo['extension']) {
            case 'json':
                return new JsonFile($path);
            case 'php':
                return new PhpArrayFile($path);
        }

        return new JsonFile($path);
    }
}
