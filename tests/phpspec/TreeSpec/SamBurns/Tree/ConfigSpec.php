<?php
namespace TreeSpec\SamBurns\Tree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Tree\Config');
    }

    function it_does_all_the_things_a_tree_does()
    {
        $this->shouldHaveType('SamBurns\Tree');
    }
}
