<?php
namespace SamBurns\Tree\FileParsing\File;

use SamBurns\Tree\FileParsing\File;

class PhpArrayFile implements File
{
    /** @var string */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return require $this->path;
    }
}
