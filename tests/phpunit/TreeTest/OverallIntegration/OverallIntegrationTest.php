<?php
namespace TreeTest\OverallIntegration;

use PHPUnit_Framework_TestCase;
use SamBurns\Tree\Config;

class OverallIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testMergingTwoConfigFiles()
    {
        // ARRANGE

        $config1 = new Config();
        $config1->populateFromFile(__DIR__ . '/../../fixtures/mergeable_sample_1.json');

        $config2 = new Config();
        $config2->populateFromFile(__DIR__ . '/../../fixtures/mergeable_sample_2.php');

        // ACT

        $config3 = $config1->mergeWithConfig($config2);

        // ASSERT

        $expectedResult = array(
            'root-node' => array(
                'sub-node'   =>  'leaf_from_first_file',
                'sub-node-2' =>  'leaf_from_second_file'
            )
        );

        $this->assertEquals($expectedResult, $config3->toArray());
    }
}
