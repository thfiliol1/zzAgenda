<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-12-16 at 11:27:03.
 */
require '/../../verification/Validation.php';
class ValidationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Validation
     */
    private $validation;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp() {
        $this->validation = new Validation();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Validation::isIdentifiant
     * @todo   Implement testIsIdentifiant().
     */
    public function testIsIdentifiant() {
        //10 char
        $this->assertTrue($this->validation->isIdentifiant("089ebd5bb4"));
        //11 char
        $this->assertFalse($this->validation->isIdentifiant("089ebd5bb49"));
        //char non valide
        $this->assertFalse($this->validation->isIdentifiant("089ebd5b*4"));
    }
    /**
     * @covers Validation::isReliability
     * @todo   Implement testIsReliability().
     */
    public function testIsReliability() {
        $this->assertTrue($this->validation->isReliability("official"));
        $this->assertTrue($this->validation->isReliability("unofficial"));
        $this->assertFalse($this->validation->isReliability("rien"));
        $this->assertFalse($this->validation->isReliability(5));
    }

    /**
     * @covers Validation::isUrlRSS
     * @todo   Implement testIsUrlRSS().
     */
    public function testIsUrlRSS() {
        $this->assertTrue($this->validation->isUrlRSS("http://test.com"));
        $this->assertFalse($this->validation->isUrlRSS("test.com"));
    }


}