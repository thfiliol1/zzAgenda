<?php
/**
 * Classe permettant d'isoler les requêtes SQL et de modéliser les résultats en objet métier
 */
class DAL {
    
    private $pathDBUser;
    private $pathDBConference;
    private $pathDBLike;
    /**
     * Constructeur de la classe
     */
    public function __construct($pathDBUser="persistence/DB/user.json", 
                                $pathDBConference="persistence/DB/conference.json", 
                                $pathDBLike="persistence/DB/like.json"){
        $this->pathDBUser=$pathDBUser;
        $this->pathDBConference=$pathDBConference;
        $this->pathDBLike=$pathDBLike;
    }
    
    public function get_user($email){
        $tab = json_decode(file_get_contents($this->pathDBUser),TRUE);
        if(array_key_exists($email,$tab)){
            return $tab[$email];
        }
        else{
            return false;
        }        
    }
    
    public function get_future_conferences(){
        $tab = json_decode(file_get_contents($this->pathDBConference),TRUE);

        foreach ($tab as $key => $conferenceInfo) {
            if($conferenceInfo["date"]>  time()){
                $res[$key]=$conferenceInfo;
            }
        }
        return $res;
    }

    public function get_conferences(){
        return json_decode(file_get_contents($this->pathDBConference),TRUE);
    }

    public function save_conferences($tabConf) {
        file_put_contents($this->pathDBConference, json_encode($tabConf));
    }

    public function save_state_user($user){
        $tabUser = json_decode(file_get_contents($this->pathDBUser),TRUE);
        $tabUser[$user->getEmail()] = $user->expose();
        file_put_contents($this->pathDBUser, json_encode($tabUser));
    }
    
    public function isLike($idConf, $idEmail){
        $tabLike = json_decode(file_get_contents($this->pathDBLike),TRUE);
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf && $like["user_id"]==$idEmail){
                return TRUE;
            }
        }
        return FALSE;
    }
    
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
    public function getLikes(){
        return json_decode(file_get_contents($this->pathDBLike),TRUE);
    }
    public function saveLikes($tabLike){
        file_put_contents($this->pathDBLike, json_encode($tabLike));
    }    
}