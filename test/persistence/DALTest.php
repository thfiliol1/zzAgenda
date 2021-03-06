<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-12 at 09:03:15.
 */

require './persistence/DAL.php';
require './business/Conference.php';
require './business/User.php';
require './business/Like.php';

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
        $this->dal = new DAL("./test/persistence/DB/user.json",
                            "./test/persistence/DB/conference.json",
                            "./test/persistence/DB/like.json");
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
        $userInfo = $this->dal->get_user($email);
        $this->assertInternalType('array',$userInfo);
        $this->assertEquals('Stephane', $userInfo['firstname']);
        $this->assertEquals('Valente', $userInfo['lastname']);
        $this->assertEquals('stephanevalente@gmail.com', $userInfo['email']);
        $this->assertEquals('admin', $userInfo['role']);
        $this->assertEquals(0, $userInfo['online']);
    }
    
     /**
     * @covers DAL::get_user
     * @todo   Implement testGet_userNotExist().
     */
    public function testGet_userNotExist() {
        $email="gregoiredupont@gmail.com";
        $this->assertFalse($this->dal->get_user($email));
    }

    /**
     * @covers DAL::get_future_conferences
     * @todo   Implement testGet_future_conferences().
     */
    public function testGet_future_conferences() {
        $conferencesInfo = $this->dal->get_future_conferences();
       foreach ($conferencesInfo as $key => $conferenceInfo) {
           $this->assertGreaterThan(time(), $conferenceInfo['date']);
           $this->assertArrayHasKey('id', $conferenceInfo);
           $this->assertArrayHasKey('title', $conferenceInfo);
           $this->assertArrayHasKey('description', $conferenceInfo);
           $this->assertArrayHasKey('address', $conferenceInfo);
           $this->assertArrayHasKey('speaker', $conferenceInfo);
       }
    }

    /**
     * @covers DAL::get_conferences
     * @todo   Implement testGet_conferences().
     */
    public function testGet_conferences() {
        $conferencesInfo = $this->dal->get_conferences();
        $this->assertEquals(5, count($conferencesInfo));
        foreach ($conferencesInfo as $key => $conferenceInfo) {
           $this->assertArrayHasKey('id', $conferenceInfo);
           $this->assertArrayHasKey('date', $conferenceInfo);
           $this->assertArrayHasKey('title', $conferenceInfo);
           $this->assertArrayHasKey('description', $conferenceInfo);
           $this->assertArrayHasKey('address', $conferenceInfo);
           $this->assertArrayHasKey('speaker', $conferenceInfo);
       }
    }

    /**
     * @covers DAL::save_conferences
     * @todo   Implement testSave_conferences().
     */
    public function testSave_conferences() {
        $conferencesInfo = $this->dal->get_conferences();
        $newConference = new Conference("1", "1513069717", "conference test", "description test", "address test", "speaker test");
        $tabConf[$newConference->getId()]=$newConference->expose();
        $this->dal->save_conferences($tabConf);
        $conferenceInfo = $this->dal->get_conferences();
        $this->dal->save_conferences($tabConf);
        $this->assertEquals('1513069717', $conferenceInfo[$newConference->getId()]['date']);
        $this->assertEquals('conference test', $conferenceInfo[$newConference->getId()]['title']);
        $this->assertEquals('description test', $conferenceInfo[$newConference->getId()]['description']);
        $this->assertEquals('address test', $conferenceInfo[$newConference->getId()]['address']);
        $this->assertEquals('speaker test', $conferenceInfo[$newConference->getId()]['speaker']);
        $this->dal->save_conferences($conferencesInfo);
    }

    /**
     * @covers DAL::save_state_user
     * @todo   Implement testSave_state_user().
     */
    public function testSave_state_user() {
        $userOrigin = new User("Stephane", "Valente", "stephanevalente@gmail.com", "f33227a7e80a9709f6998f542bb0ce6b", "admin", "0");
        $user = new User("Stephane", "Valente", "stephanevalente@gmail.com", "1234", "user", "1");
        
        $this->dal->save_state_user($user); 
        $userInfo = $this->dal->get_user("stephanevalente@gmail.com");
        $this->assertInternalType('array',$userInfo);
        $this->assertEquals('Stephane', $userInfo['firstname']);
        $this->assertEquals('Valente', $userInfo['lastname']);
        $this->assertEquals('stephanevalente@gmail.com', $userInfo['email']);
        $this->assertEquals('user', $userInfo['role']);
        $this->assertEquals(1, $userInfo['online']);
        
         $this->dal->save_state_user($userOrigin);
    }

    /**
     * @covers DAL::isLike
     * @todo   Implement testIsLike().
     */
    public function testIsLike() {
        $this->assertTrue($this->dal->isLike(1, "thomasfiliol@yahoo.fr"));
    }
    
    /**
     * @covers DAL::isLike
     * @todo   Implement testIsLike().
     */
    public function testIsNotLike() {
        $this->assertFalse($this->dal->isLike(10, "thomasfiliol@yahoo.fr"));
    }

    /**
     * @covers DAL::getNbLikeOfConference
     * @todo   Implement testGetNbLikeOfConference().
     */
    public function testGetNbLikeOfConference() {
        $this->assertEquals(2,  $this->dal->getNbLikeOfConference(2));
    }

    /**
     * @covers DAL::getLikes
     * @todo   Implement testGetLikes().
     */
    public function testGetLikes() {
        $this->assertEquals(3, count($this->dal->getLikes()));
    }

    /**
     * @covers DAL::saveLikes
     * @todo   Implement testSaveLikes().
     */
    public function testSaveLikes() {
        $likes = $this->dal->getLikes();
        $like = new Like("thomasfiliol@yahoo.fr", 5);
        $tabLike[] = $like->expose();
        $this->dal->saveLikes($tabLike);
        $this->assertEquals(1,  $this->dal->getNbLikeOfConference(5));
        $this->dal->saveLikes($likes);
    }

}
