<?php
namespace SamBurns\Tree\FileParsing\File\Exception;

class FileDoesNotExist extends \Exception
{
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->message = 'Cannot read file at ' . $path . ': file doesn\'t exist or isn\'t readable.';
    }
}
