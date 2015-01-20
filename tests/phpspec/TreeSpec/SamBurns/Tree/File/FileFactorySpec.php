<?php

namespace TreeSpec\SamBurns\Tree\File;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Tree\File\FileFactory');
    }
}
