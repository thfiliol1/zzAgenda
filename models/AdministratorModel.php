<?php

class AdministratorModel {

    private $dal;
    
    public function __construct($pathDBUser="persistence/DB/user.json", 
                                $pathDBConference="persistence/DB/conference.json", 
                                $pathDBLike="persistence/DB/like.json"){
	$this->dal = new DAL($pathDBUser,$pathDBConference,$pathDBLike);
    }

    public function connect($email,$pwd){
        global $language;
        $userInfo = $this->dal->get_user($email);
        if ($userInfo == FALSE){
            throw new Exception($language['email_not_recognized']);
        }
        else{
            $user = new User($userInfo["firstname"], 
                                    $userInfo["lastname"], 
                                    $userInfo["email"], 
                                    $userInfo["password"],
                                    $userInfo["role"],1);
            
            if(md5($pwd) == $userInfo["password"]){
                if($userInfo["online"] == 0){
                    $this->dal->save_state_user($user);
                    if($userInfo["role"] == "admin"){
                        $_SESSION['role']='admin';
                        $_SESSION['login']=$email;
                    }
                    else{
                        $_SESSION['role']='user';
                        $_SESSION['login']=$email;
                    }
                }
                else{
                    throw new Exception($language['already_connected']);
                }
            }
            else{
                throw new Exception($language['password_not_valid']);
            }
        }
        return $user;
        
    }
    

    
    public function isAdmin(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=="admin"){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }


    public function disconnect(){
        $userInfo=$this->dal->get_user($_SESSION["login"]);
        
        $user = new User($userInfo["firstname"], 
                                    $userInfo["lastname"], 
                                    $userInfo["email"], 
                                    $userInfo["password"],
                                    $userInfo["role"],0);
 
        $this->dal->save_state_user($user);
        session_unset();     
    }  


    public function editConf($conf) {
        $tabConfs = $this->dal->get_conferences();
        $tabConfs[$conf->getId()]=$conf->expose();
        $this->dal->save_conferences($tabConfs);
    }

    public function addConf($date,$title,$city,$speaker,$description) {
        $tabConfs = $this->dal->get_conferences();
        $keys = array_keys($tabConfs);
        $last_key = $keys[count($keys)-1];
        $newId=$last_key+1;
        $conf=new Conference($newId,$date,$title,$description,$city,$speaker);
        $tabConfs[$conf->getId()]=$conf->expose();
        $this->dal->save_conferences($tabConfs);
    }

    public function delConf($id) {
        $tabConfs = $this->dal->get_conferences();
        $tabLikes = $this->dal->getLikes();
        $tabLikesNew = array();
        foreach ($tabLikes as $like) {
            if($like["conference_id"]!=$id){
                $tabLikesNew[] = $like;
            }
        }
        unset($tabConfs[$id]);
        $this->dal->saveLikes($tabLikesNew);
        $this->dal->save_conferences($tabConfs);
    }

}
