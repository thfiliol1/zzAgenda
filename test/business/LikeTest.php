<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-13 at 20:35:35.
 */
//require './business/Like.php';

//require '/../../business/Like.php';
class LikeTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Like
     */
    protected $like;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->like = new Like("stephanevalente@gmail.com",12);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Like::getUser_id
     * @todo   Implement testGetUser_id().
     */
    public function testGetUser_id() {
        $this->assertEquals("stephanevalente@gmail.com",  $this->like->getUser_id());
    }

    /**
     * @covers Like::getConference_id
     * @todo   Implement testGetConference_id().
     */
    public function testGetConference_id() {
        $this->assertEquals(12, $this->like->getConference_id());
    }

    /**
     * @covers Like::expose
     * @todo   Implement testExpose().
     */
    public function testExpose() {
        $this->assertInternalType('array', $this->like->expose());
    }

}