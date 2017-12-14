<?php
/**
 * Classe modélisant toutes les méthodes pouvant être appelé par un utilisateur 
 */
class UserModel {

    private $dal;
    /**
     * Constructeur de la classe
     */
    public function __construct($pathDBUser="persistence/DB/user.json", 
                                $pathDBConference="persistence/DB/conference.json", 
                                $pathDBLike="persistence/DB/like.json"){
        $this->dal=new DAL($pathDBUser,$pathDBConference,$pathDBLike);
    }
    
    public function get_future_conferences(){
        $conferencesInfo = $this->dal->get_future_conferences();
        return $this->create_table_conferences($conferencesInfo);
    }

    public function get_conferences(){
        $conferencesInfo = $this->dal->get_conferences();
        return $this->create_table_conferences($conferencesInfo);
    }


    public function create_table_conferences($conferencesInfo) {
        $idEmail = $this->getLoginUserConnected();
        $tabConferences=array();
        foreach ($conferencesInfo as $key => $conferenceInfo) {
            $nbLike = $this->dal->getNbLikeOfConference($conferenceInfo["id"]);
            $canLike = $this->dal->isLike($conferenceInfo["id"], $idEmail); 
            $conf = new Conference($conferenceInfo["id"],
                                                $conferenceInfo["date"], 
                                               $conferenceInfo["title"],
                                               $conferenceInfo["description"], 
                                               $conferenceInfo["address"] , 
                                               $conferenceInfo["speaker"]);
            $tabConferences[] = array("conference" => $conf, "userCanLike" => $canLike, "nbLike" => $nbLike);
        }
        return $tabConferences;
    }
    
    public function addLike($id_conf){
        $idEmail = $this->getLoginUserConnected();
        $tabLike = $this->dal->getLikes();
        $like = new Like($idEmail, $id_conf);
        $tabLike[] = $like->expose();
        $this->dal->saveLikes($tabLike);
    }
    
    public function deleteLike($id_conf){
        $idEmail = $this->getLoginUserConnected();
        $tabLike = $this->dal->getLikes();
        $tabLikeNew = array();
        foreach ($tabLike as $like){
            if($like["conference_id"]==$id_conf && $like["user_id"]==$idEmail){
            }
            else{
                $tabLikeNew[] = $like;
            }
            
        }
        
        $this->dal->saveLikes($tabLikeNew);        
    }


    public function isAuthentificate(){
        if(isset($_SESSION['role'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function getLoginUserConnected(){
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
    }
    
    public function isUser(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=="user"){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }
}
