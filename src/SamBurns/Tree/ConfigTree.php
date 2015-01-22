<?php
namespace SamBurns\Tree;

use SamBurns\Tree\FileParsing\FileFactory;
use SamBurns\Tree\FileParsing\File\Exception\CannotParseFileType;
use SamBurns\Tree\FileParsing\File\Exception\FileDoesNotExist;

class ConfigTree extends BasicTree implements Tree, ConfigTreeFromFile, ArrayableTree
{
    /** @var FileFactory */
    private $fileFactory;

    /**
     * @param array|null       $initialArray
     * @param FileFactory|null $fileFactory
     */
    public function __construct($initialArray = array(), FileFactory $fileFactory = null)
    {
        $this->populateFromArray($initialArray);
        $this->fileFactory = $fileFactory ?: new FileFactory();
    }

    /**
     * @throws CannotParseFileType
     * @throws FileDoesNotExist
     *
     * @param string $path
     */
    public function populateFromFile($path)
    {
        $file = $this->fileFactory->getFile($path);
        $this->populateFromArray($file->toArray());
    }
}
