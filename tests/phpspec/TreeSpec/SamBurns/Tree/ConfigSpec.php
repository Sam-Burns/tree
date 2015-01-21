<?php
namespace TreeSpec\SamBurns\Tree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SamBurns\Tree\FileParsing\File;
use SamBurns\Tree\FileParsing\FileFactory;

class ConfigSpec extends ObjectBehavior
{
    function let(FileFactory $fileFactory)
    {
        $this->beConstructedWith($fileFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Tree\Config');
    }

    function it_does_all_the_things_a_tree_does()
    {
        $this->shouldHaveType('SamBurns\Tree');
    }

    function it_can_be_populated_from_a_file(FileFactory $fileFactory, File $file)
    {
        $sampleArray = array(
            'root-node' => array(
                'another-node' => 'leaf'
            )
        );

        $fileFactory->getFile('/path/')->willReturn($file);
        $file->toArray()->willReturn($sampleArray);

        $this->populateFromFile('/path/');

        $this->toArray()->shouldReturn($sampleArray);
    }
}
