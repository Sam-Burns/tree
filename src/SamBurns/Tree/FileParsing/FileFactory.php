<?php
namespace SamBurns\Tree\FileParsing;

use SamBurns\Tree\FileParsing\File\JsonFile;
use SamBurns\Tree\FileParsing\File\PhpArrayFile;
use SamBurns\Tree\FileParsing\File\Exception\FileDoesNotExist;

class FileFactory
{
    /**
     * @throws FileDoesNotExist
     *
     * @param string $path
     * @return File
     */
    public function getFile($path)
    {
        if (!file_exists($path) || !is_readable($path)) {
            $exception = new FileDoesNotExist();
            $exception->setPath($path);
            throw $exception;
        }

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
