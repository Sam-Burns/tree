<?php
namespace SamBurns\Tree\FileParsing\File;

use SamBurns\Tree\FileParsing\File;
use Symfony\Component\Yaml\Yaml;

class YamlFile implements File
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
        return Yaml::parse(file_get_contents($this->path));
    }
}
