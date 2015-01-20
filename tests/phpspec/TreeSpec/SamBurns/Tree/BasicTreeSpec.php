<?php
namespace TreeSpec\SamBurns;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SamBurns\Tree\BasicTree;

class TreeSpec extends ObjectBehavior
{
    function let()
    {
        $initialArray = array(
            'node' => array(
                'initial-leaf-node' => 'orig',
                'another-node'      => array(
                    'another-leaf'     => 'orig',
                    'yet-another-leaf' => 'orig'
                )
            )
        );

        $this->beConstructedWith($initialArray);
    }

    function it_can_be_converted_to_array()
    {
        $expectedArray = array(
            'node' => array(
                'initial-leaf-node' => 'orig',
                'another-node'      => array(
                    'another-leaf'     => 'orig',
                    'yet-another-leaf' => 'orig'
                )
            )
        );

        $this->toArray()->shouldBeLike($expectedArray);
    }

    function it_can_merge_with_an_array()
    {
        $newDataArray = array('node' => array('new-leaf-node' => 'new'));
        $expectedResultArray = array(
            'node' => array(
                'new-leaf-node' => 'new',
                'another-node'  => array(
                    'another-leaf'     => 'orig',
                    'yet-another-leaf' => 'orig'
                ),
                'initial-leaf-node' => 'orig'
            )
        );

        $this->mergeWithArray($newDataArray)->shouldBeLike(new BasicTree($expectedResultArray));
    }

    function merging_with_an_array_prioritises_new_array_when_there_are_key_clashes()
    {
        $newDataArray = array(
            'node' => array(
                'another-node' => array(
                    'another-leaf' => 'new'
                )
            )
        );

        $expectedArray = array(
            'node' => array(
                'initial-leaf-node' => 'orig',
                'another-node'      => array(
                    'another-leaf'     => 'new',
                    'yet-another-leaf' => 'orig'
                )
            )
        );

        $this->mergeWithArray($newDataArray)->shouldBeLike(new BasicTree($expectedArray));
    }
}
