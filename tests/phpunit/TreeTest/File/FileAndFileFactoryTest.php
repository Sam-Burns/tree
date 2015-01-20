<?php
namespace TreeTest\File;

use PHPUnit_Framework_TestCase;
use SamBurns\Tree\FileParsing\FileFactory;

class FileFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideFilenames
     *
     * @param string $pathToFile
     */
    public function testConvertingFileToArray($pathToFile)
    {
        $expectedArray = array(
            'root-node' => array(
                'sub-node' => 'leaf'
            )
        );

        $fileFactory = new FileFactory;
        $file = $fileFactory->getFile($pathToFile);

        $this->assertInstanceOf('\SamBurns\Tree\FileParsing\File', $file);
        $this->assertSame($expectedArray, $file->toArray());
    }

    public function provideFilenames()
    {
        return array(
            array(__DIR__ . '/../../fixtures/sample.json'),
        );
    }
}
