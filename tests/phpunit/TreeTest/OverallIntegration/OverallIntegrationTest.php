<?php
namespace TreeTest\OverallIntegration;

use PHPUnit_Framework_TestCase;
use SamBurns\Tree\ConfigTree;

class OverallIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testMergingTwoConfigFiles()
    {
        // ARRANGE

        $config1 = new ConfigTree();
        $config1->populateFromFile(__DIR__ . '/../../fixtures/mergeable_sample_1.json');

        $config2 = new ConfigTree();
        $config2->populateFromFile(__DIR__ . '/../../fixtures/mergeable_sample_2.php');

        // ACT

        $config1->mergeInTree($config2);

        // ASSERT

        $expectedResult = array(
            'root-node' => array(
                'sub-node'   =>  'leaf_from_first_file',
                'sub-node-2' =>  'leaf_from_second_file'
            )
        );

        $this->assertEquals($expectedResult, $config1->toArray());
    }
}
