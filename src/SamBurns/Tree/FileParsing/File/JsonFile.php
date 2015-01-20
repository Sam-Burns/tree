<?php
namespace SamBurns\Tree\FileParsing\File;

use SamBurns\Tree\FileParsing\File;

class JsonFile implements File
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
        $fileContents = file_get_contents($this->path);
        return json_decode($fileContents, true);
    }
}
