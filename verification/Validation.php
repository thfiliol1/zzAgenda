<?php
/**
 * Classe permettant de valider les données envoyées
 */
class Validation{
    /**
     * Vérifie si l'identifiant correspond à un encodage md5
     * @param String $p_id
     * @return boolean
     */
    public static function isIdentifiant($p_id){
        if(preg_match('#^[a-z0-9]{10}$#', $p_id) == 1){
            return TRUE;
        }
        else{
            return FALSE;
        }         
    }
    
    public static function isEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }
        else{
            return FALSE;
        }         
    }
    
    public static function isReliability($p_reliability){
        switch ($p_reliability) {
            case "official":
                    return TRUE;
            case "unofficial":
                    return TRUE;                
            default:
                    return FALSE;
        }
    }
    
    public static function isUrlRSS($p_url){
        if(preg_match('#^http#', $p_url)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
     
}

