<?php
namespace SamBurns\Tree\FileParsing\File\Exception;

class CannotParseFileType extends \Exception
{
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->message = 'Cannot read file at ' . $path . ': file extension not recognised as supported file type';
    }
}
