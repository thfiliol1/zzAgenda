<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-13 at 21:07:16.
 */
class ConferenceTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Conference
     */
    protected $conference;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->conference = new Conference(9, "1509456600", "title", "description", "theix", "Igor Bulik");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Conference::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals(9, $this->conference->getId());
    }

    /**
     * @covers Conference::getDate
     * @todo   Implement testGetDate().
     */
    public function testGetDate() {
        $this->assertEquals("1509456600", $this->conference->getDate());
    }

    /**
     * @covers Conference::getTitle
     * @todo   Implement testGetTitle().
     */
    public function testGetTitle() {
        $this->assertEquals("title", $this->conference->getTitle());
    }

    /**
     * @covers Conference::getDescription
     * @todo   Implement testGetDescription().
     */
    public function testGetDescription() {
        $this->assertEquals("description", $this->conference->getDescription());
    }

    /**
     * @covers Conference::getAddress
     * @todo   Implement testGetAddress().
     */
    public function testGetAddress() {
        $this->assertEquals("theix", $this->conference->getAddress());
    }

    /**
     * @covers Conference::getSpeaker
     * @todo   Implement testGetSpeaker().
     */
    public function testGetSpeaker() {
        $this->assertEquals("Igor Bulik", $this->conference->getSpeaker());
    }

    /**
     * @covers Conference::expose
     * @todo   Implement testExpose().
     */
    public function testExpose() {
        $this->assertInternalType('array', $this->conference->expose());
    }

}
