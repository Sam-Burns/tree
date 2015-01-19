<?php
namespace TreeSpec\SamBurns;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SamBurns\Tree;

class TreeSpec extends ObjectBehavior
{
    function let()
    {
        $initialArray = array(
            'node' => array(
                'initial-leaf-node' => 123
            )
        );

        $this->beConstructedWith($initialArray);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Tree');
    }

    function it_can_be_converted_to_array()
    {
        $expectedArray = array(
            'node' => array(
                'initial-leaf-node' => 123
            )
        );

        $this->toArray()->shouldBeLike($expectedArray);
    }

    function it_can_merge_with_an_array()
    {
        $dataArray = array('node' => array('new-leaf-node' => 456));
        $expectedResultArray = array(
            'node' => array(
                'new-leaf-node'     => 456,
                'initial-leaf-node' => 123
            )
        );

        $this->mergeWithArray($dataArray)->shouldBeLike(new Tree($expectedResultArray));
    }
}
