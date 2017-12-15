<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Class which manages the data in a Json format
 */
class DAL {
    
    private $pathDBUser;
    private $pathDBConference;
    private $pathDBLike;
    
    
    /**
     * Constructor which create the data pathes
     * @param String $pathDB* Pathes to the data files
     */
    public function __construct($pathDBUser="persistence/DB/user.json", 
                                $pathDBConference="persistence/DB/conference.json", 
                                $pathDBLike="persistence/DB/like.json"){
        $this->pathDBUser=$pathDBUser;
        $this->pathDBConference=$pathDBConference;
        $this->pathDBLike=$pathDBLike;
    }
    
    /**
     * Function which gets user informations based on the email identifier
     * @param String $email Email of the user
     * @return Array Board of user informations
     */
    public function get_user($email){
        $tab = json_decode(file_get_contents($this->pathDBUser),TRUE);
        if(array_key_exists($email,$tab)){
            return $tab[$email];
        }
        else{
            return false;
        }        
    }
    
    /**
     * Function which gets all the schedules after the current date
     * @return Array Board of conference informations
     */
    public function get_future_conferences(){
        $tab = json_decode(file_get_contents($this->pathDBConference),TRUE);

        foreach ($tab as $key => $conferenceInfo) {
            if($conferenceInfo["date"]>  time()){
                $res[$key]=$conferenceInfo;
            }
        }
        return $res;
    }

    /**
     * Function which gets all the schedules 
     * @return Array Board of conference informations
     */
    public function get_conferences(){
        return json_decode(file_get_contents($this->pathDBConference),TRUE);
    }

    /**
     * Function which saves all the schedules 
     * @param Array $tabConf Board of conference classes
     */
    public function save_conferences($tabConf) {
        file_put_contents($this->pathDBConference, json_encode($tabConf));
    }

    /**
     * Function which saves the user state (connected or not)
     * @param User $user User class which need to be saved
     */
    public function save_state_user($user){
        $tabUser = json_decode(file_get_contents($this->pathDBUser),TRUE);
        $tabUser[$user->getEmail()] = $user->expose();
        file_put_contents($this->pathDBUser, json_encode($tabUser));
    }
    
    /**
     * Function which checks if a schedule is liked or not by a user
     * @param String $idConf Conference identifiers
     * @param String $idEmail User email
     * @return Boolean True if the schedule is liked
     */
    public function isLike($idConf, $idEmail){
        $tabLike = json_decode(file_get_contents($this->pathDBLike),TRUE);
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf && $like["user_id"]==$idEmail){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    /**
     * Function which gets the number of likes based on the conference identifier
     * @param String $idConf Conference identifier
     * @return Number Number of likes on a schedule
     */
    public function getNbLikeOfConference($idConf){
        $tabLike = json_decode(file_get_contents($this->pathDBLike),TRUE);
        $nbConf = 0;
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf){
                $nbConf++;
            }
        }  
        return $nbConf;
    }
    
    /**
     * Function which gets all the likes 
     * @return Array Board of likes informations
     */
    public function getLikes(){
        return json_decode(file_get_contents($this->pathDBLike),TRUE);
    }
    
    /**
     * Function which saves the likes
     * @param Array $tabLike Board of "like classes"
     */
    public function saveLikes($tabLike){
        file_put_contents($this->pathDBLike, json_encode($tabLike));
    }    
}