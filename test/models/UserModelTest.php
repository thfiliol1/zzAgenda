<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-12-12 at 16:14:24.
 */
require './models/UserModel.php';

//require '/../../models/UserModel.php';

class UserModelTest extends PHPUnit_Framework_TestCase {

    /**
     * @var UserModel
     */
    protected $userModel;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
       /* $this->userModel = new UserModel("C:/wamp/www/zzAgenda/test/persistence/DB/user.json",
                            "C:/wamp/www/zzAgenda/test/persistence/DB/conference.json",
                            "C:/wamp/www/zzAgenda/test/persistence/DB/like.json");*/
        $this->userModel = new UserModel("./test/persistence/DB/user.json",
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
     * @covers UserModel::get_future_conferences UserModel::create_table_conferences
     * @todo   Implement testGet_future_conferences().
     */
    public function testGet_future_conferences() {
        $results = $this->userModel->get_future_conferences();
        $this->assertInternalType('array', $results);
        foreach ($results as $result) {
            $this->assertInstanceOf("Conference", $result["conference"]);
            $this->assertArrayHasKey('userCanLike', $result);
            $this->assertArrayHasKey('nbLike', $result);
            $this->assertNotNull($result["conference"]->getId());
            $this->assertNotNull($result["conference"]->getTitle());
            $this->assertNotNull($result["conference"]->getAddress());
            $this->assertNotNull($result["conference"]->getDate());
            $this->assertGreaterThan(time(), $result["conference"]->getDate());
            $this->assertNotNull($result["conference"]->getDescription());
            $this->assertNotNull($result["conference"]->getSpeaker());          
        }        
    }

    /**
     * @covers UserModel::get_conferences UserModel::create_table_conferences
     * @todo   Implement testGet_conferences().
     */
    public function testGet_conferences() {
        $results = $this->userModel->get_conferences();
        $this->assertInternalType('array', $results);
        $this->assertEquals(5,  count($results));
        foreach ($results as $result) {
            $this->assertInstanceOf("Conference", $result["conference"]);
            $this->assertArrayHasKey('userCanLike', $result);
            $this->assertArrayHasKey('nbLike', $result);
            $this->assertNotNull($result["conference"]->getId());
            $this->assertNotNull($result["conference"]->getTitle());
            $this->assertNotNull($result["conference"]->getAddress());
            $this->assertNotNull($result["conference"]->getDate());
            $this->assertNotNull($result["conference"]->getDescription());
            $this->assertNotNull($result["conference"]->getSpeaker());          
        }          
    }


    /**
     * @covers UserModel::addLike
     * @todo   Implement testAddLike().
     */
    public function testAddLike() {
       $_SESSION['login']="charlesdupont@gmail.com";
        $this->userModel->addLike(2);
        unset($_SESSION['login']);
        $results = $this->userModel->get_conferences();
        foreach ($results as $result) {
            if($result["conference"]->getId() == 2){
                $this->assertArrayHasKey('nbLike', $result);
                $this->assertEquals(3,$result["nbLike"]);
            }  
        }      
    }

    /**
     * @covers UserModel::deleteLike
     * @todo   Implement testDeleteLike().
     */
    public function testDeleteLike() {
        $_SESSION['login']="charlesdupont@gmail.com";
        $this->userModel->deleteLike(2);
        unset($_SESSION['login']);
        $results = $this->userModel->get_conferences();
        foreach ($results as $result) {
            if($result["conference"]->getId() == 2){
                $this->assertArrayHasKey('nbLike', $result);
                $this->assertEquals(2,$result["nbLike"]);
            }  
        }         
    }

    /**
     * @covers UserModel::isAuthentificate
     * @todo   Implement testIsAuthentificate().
     */
    public function testIsAuthentificate() {
       $_SESSION['role'] = " ";
       $this->assertTrue($this->userModel->isAuthentificate());
       unset($_SESSION['role']);
       $this->assertFalse($this->userModel->isAuthentificate());
    }

    /**
     * @covers UserModel::getLoginUserConnected
     * @todo   Implement testGetLoginUserConnected().
     */
    public function testGetLoginUserConnected() {
        $_SESSION['login']="charlesdupont@gmail.com";
        $this->assertEquals("charlesdupont@gmail.com",  $this->userModel->getLoginUserConnected());
        unset($_SESSION['login']);
        $this->assertNull($this->userModel->getLoginUserConnected());
        
    }

    /**
     * @covers UserModel::isUser
     * @todo   Implement testIsUser().
     */
    public function testIsUser() {
        $this->assertFalse($this->userModel->isUser());
        $_SESSION['role'] = "admin";
        $this->assertFalse($this->userModel->isUser());
        $_SESSION['role'] = "user";
        $this->assertTrue($this->userModel->isUser());
        unset($_SESSION['role']);
    }

}
