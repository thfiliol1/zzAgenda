<?php
/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Class which modelizes all methods that can be called by an user
 */
class UserModel {

    private $dal;
    
    /**
     * Constructor which create the data access layer
     * @param String $pathDB* Pathes to the data files
     */
    public function __construct($pathDBUser="persistence/DB/user.json", 
                                $pathDBConference="persistence/DB/conference.json", 
                                $pathDBLike="persistence/DB/like.json"){
        $this->dal=new DAL($pathDBUser,$pathDBConference,$pathDBLike);
    }
    
    /**
     * Function which gets all the schedules after the current date
     * @return Array Board of conference classes
     */
    public function get_future_conferences(){
        $conferencesInfo = $this->dal->get_future_conferences();
        return $this->create_table_conferences($conferencesInfo);
    }

    
    /**
     * Function which gets all the schedules
     * @return Array Board of conference classes
     */
    public function get_conferences(){
        $conferencesInfo = $this->dal->get_conferences();
        return $this->create_table_conferences($conferencesInfo);
    }


    /**
     * Function which creates a board of "conference classes"
     * @param Array $conferencesInfo Array which contains all the schedules data
     * @return Array Board of conference classes
     */
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
    
    /**
     * Function which add a like based on the conference id
     * @param String $id_conf Conference identifier
     */
    public function addLike($id_conf){
        $idEmail = $this->getLoginUserConnected();
        $tabLike = $this->dal->getLikes();
        $like = new Like($idEmail, $id_conf);
        $tabLike[] = $like->expose();
        $this->dal->saveLikes($tabLike);
    }
    
    /**
     * Function which delete a like based on the conference id
     * @param String $id_conf Conference identifier
     */
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

    /**
     * Function which checks if an user is authenticated
     * @return Boolean User authenticated or not
     */
    public function isAuthentificate(){
        if(isset($_SESSION['role'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    
    /**
     * Function which gets the login of the current user
     * @return String User login
     */
    public function getLoginUserConnected(){
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
    }
    
    /**
     * Function which checks if a visitor is an user or an administrator
     * @return Boolean User or administrator
     */
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
