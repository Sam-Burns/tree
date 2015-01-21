<?php
namespace SamBurns\Tree;

use SamBurns\Tree\FileParsing\File\Exception\CannotParseFileType;
use SamBurns\Tree\FileParsing\File\Exception\FileDoesNotExist;

interface ConfigFromFile
{
    /**
     * @return array
     */
    public function toArray();

    /**
     * @param array $arrayToMergeIn
     * @return Config
     */
    public function mergeWithArray($arrayToMergeIn);

    /**
     * @throws CannotParseFileType
     * @throws FileDoesNotExist
     *
     * @param string $path
     */
    public function populateFromFile($path);

    /**
     * @param Config $config
     * @return Config
     */
    public function mergeWithConfig(Config $config);
}
