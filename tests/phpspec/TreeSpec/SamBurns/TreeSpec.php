<?php
namespace TreeSpec\SamBurns;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SamBurns\Tree;
use SamBurns\Tree\File\FileFactory;

class TreeSpec extends ObjectBehavior
{
    function let(FileFactory $fileFactory)
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

        $this->beConstructedWith($initialArray, $fileFactory);
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

    function it_can_merge_with_an_array(FileFactory $fileFactory)
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

        $this->mergeWithArray($newDataArray)->shouldBeLike(new Tree($expectedResultArray));
    }

    function merging_with_an_array_prioritises_new_array_when_there_are_key_clashes(FileFactory $fileFactory)
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

        $this->mergeWithArray($newDataArray)->shouldBeLike(new Tree($expectedArray, $fileFactory));
    }

//    function it_can_merge_in_file_contents()
//    {
//        $newDataArray = array(
//            'node' => array(
//                'another-node' => array(
//                    'another-leaf'    => 'new'
//                )
//            )
//        );
//
//        $expectedArray = array(
//            'node' => array(
//                'initial-leaf-node' => 'orig',
//                'another-node'      => array(
//                    'another-leaf'     => 'new',
//                    'yet-another-leaf' => 'orig'
//                )
//            )
//        );
//
//        $this->mergeWithArray($newDataArray)->shouldBeLike(new Tree($expectedArray));
//    }
}
