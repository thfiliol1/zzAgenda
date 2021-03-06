<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-13 at 20:29:38.
 */
require './verification/Validation.php';

class ValidationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Validation
     */
    protected $validation;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->validation = new Validation();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Validation::isEmail
     * @todo   Implement testIsEmail().
     */
    public function testIsEmail() {
        $this->assertFalse($this->validation->isEmail("notAEmail"));
        $this->assertTrue($this->validation->isEmail("thomasfiliol@yahoo.fr"));
    }

}
