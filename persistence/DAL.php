<?php
/**
 * Classe permettant d'isoler les requêtes SQL et de modéliser les résultats en objet métier
 */
class DAL {
    /**
     * Constructeur de la classe
     */
    public function __construct(){}
    
    public function get_user($email, $file="persistence/DB/user.json"){
        $tab = json_decode(file_get_contents($file),TRUE);
        if(array_key_exists($email,$tab)){
            return $tab[$email];
        }
        else{
            return false;
        }        
    }
    
    public function get_future_conferences($file="persistence/DB/conference.json"){
        $tab = json_decode(file_get_contents($file),TRUE);

        foreach ($tab as $key => $conferenceInfo) {
            if($conferenceInfo["date"]>  time()){
                $res[$key]=$conferenceInfo;
            }
        }
        return $res;
    }

    public function get_conferences($file="persistence/DB/conference.json"){
        return json_decode(file_get_contents($file),TRUE);
    }

    public function save_conferences($tabConf,$file="persistence/DB/conference.json") {
        file_put_contents($file, json_encode($tabConf));
    }

    public function save_state_user($user,$file="persistence/DB/user.json"){
        $tabUser = json_decode(file_get_contents($file),TRUE);
        $tabUser[$user->getEmail()] = $user->expose();
        file_put_contents("persistence/DB/user.json", json_encode($tabUser));
    }
    
    public function isLike($idConf, $idEmail, $file="persistence/DB/like.json"){
        $tabLike = json_decode(file_get_contents($file),TRUE);
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf && $like["user_id"]==$idEmail){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function getNbLikeOfConference($idConf,$file="persistence/DB/like.json"){
        $tabLike = json_decode(file_get_contents($file),TRUE);
        $nbConf = 0;
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf){
                $nbConf++;
            }
        }  
        return $nbConf;
    }
    public function getLikes($file="persistence/DB/like.json"){
        return json_decode(file_get_contents($file),TRUE);
    }
    public function saveLikes($tabLike, $file="persistence/DB/like.json"){
        file_put_contents($file, json_encode($tabLike));
    }    
}