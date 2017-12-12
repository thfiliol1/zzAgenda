<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-12 at 09:03:15.
 */
require './persistence/DAL.php';
class DALTest extends PHPUnit_Framework_TestCase {

    /**
     * @var DAL
     */
    protected $dal;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->dal = new DAL;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DAL::get_user
     * @todo   Implement testGet_user().
     */
    public function testGet_user() {
        $email="stephanevalente@gmail.com";
        $userInfo = $this->dal->get_user($email, "./test/persistence/DB/user.json");
        $this->assertInternalType('array',$userInfo);
        $this->assertEquals('Stephane', $userInfo['firstname']);
        $this->assertEquals('Valente', $userInfo['lastname']);
        $this->assertEquals('stephanevalente@gmail.com', $userInfo['email']);
        $this->assertEquals('admin', $userInfo['role']);
        $this->assertEquals(0, $userInfo['online']);
    }

    /**
     * @covers DAL::get_future_conferences
     * @todo   Implement testGet_future_conferences().
     */
    public function testGet_future_conferences() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::get_conferences
     * @todo   Implement testGet_conferences().
     */
    public function testGet_conferences() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::save_conferences
     * @todo   Implement testSave_conferences().
     */
    public function testSave_conferences() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::save_state_user
     * @todo   Implement testSave_state_user().
     */
    public function testSave_state_user() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::isLike
     * @todo   Implement testIsLike().
     */
    public function testIsLike() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::getNbLikeOfConference
     * @todo   Implement testGetNbLikeOfConference().
     */
    public function testGetNbLikeOfConference() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::getLikes
     * @todo   Implement testGetLikes().
     */
    public function testGetLikes() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers DAL::saveLikes
     * @todo   Implement testSaveLikes().
     */
    public function testSaveLikes() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
