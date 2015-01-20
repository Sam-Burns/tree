<?php
namespace TreeSpec\SamBurns\Tree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SamBurns\Tree\File\FileFactory;

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
}
