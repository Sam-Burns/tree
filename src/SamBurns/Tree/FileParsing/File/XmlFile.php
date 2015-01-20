<?php
namespace SamBurns\Tree\FileParsing\File;

use SamBurns\Tree\FileParsing\File;
use Zend\Config\Reader\Xml as Zf2XmlConfigReader;

class XmlFile implements File
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
        $zf2XmlConfigReader = new Zf2XmlConfigReader();
        return $zf2XmlConfigReader->fromFile($this->path);
    }
}
