<?php
namespace TreeSpec\SamBurns;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Tree');
    }
}
