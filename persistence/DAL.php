<?php
/**
 * Classe permettant d'isoler les requêtes SQL et de modéliser les résultats en objet métier
 */
class DAL {
    /**
     * Constructeur de la classe
     */
    public function __construct(){}
    
    public function get_user($email){
        $tab = json_decode(file_get_contents("persistence/DB/user.json"),TRUE);
        if(array_key_exists($email,$tab)){
            return $tab[$email];
        }
        else{
            return false;
        }        
    }
    
    public function get_future_conferences(){
        $tab = json_decode(file_get_contents("persistence/DB/conference.json"),TRUE);

        foreach ($tab as $key => $conferenceInfo) {
            if($conferenceInfo["date"]>  time()){
                $res[$key]=$conferenceInfo;
            }
        }
        return $res;
    }

    public function get_conferences(){
        return json_decode(file_get_contents("persistence/DB/conference.json"),TRUE);
    }

    public function save_conferences($tabConf) {
        file_put_contents("persistence/DB/conference.json", json_encode($tabConf));
    }

    public function save_state_user($user){
        $tabUser = json_decode(file_get_contents("persistence/DB/user.json"),TRUE);
        $tabUser[$user->getEmail()] = $user->expose();
        file_put_contents("persistence/DB/user.json", json_encode($tabUser));
    }
    
    public function isLike($idConf, $idEmail){
        $tabLike = json_decode(file_get_contents("persistence/DB/like.json"),TRUE);
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf && $like["user_id"]==$idEmail){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function getNbLikeOfConference($idConf){
        $tabLike = json_decode(file_get_contents("persistence/DB/like.json"),TRUE);
        $nbConf = 0;
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf){
                $nbConf++;
            }
        }  
        return $nbConf;
    }
    public function getLikes(){
        return json_decode(file_get_contents("persistence/DB/like.json"),TRUE);
    }
    public function saveLikes($tabLike){
        file_put_contents("persistence/DB/like.json", json_encode($tabLike));
    }    
}