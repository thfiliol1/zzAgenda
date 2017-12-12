<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-12-16 at 14:10:03.
 */
require './verification/Parameter.php';
class ParameterTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Parameter
     */
    private $parameter;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->parameter = new Parameter();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Parametre::getParam
     * @todo   Implement testGetParam().
     */
    public function testGetParam() {
        //variable param n'existe pas
        $this->assertNull($this->parameter->getParam("param"),"parameter not known");
    }
    
    public function testGetParamExist() {
        //variable existe
        $REQUEST["param"]="exist";
        $this->assertNull($this->parameter->getParam("param"),"exist");
    }

}