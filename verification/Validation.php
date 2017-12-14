<?php
/**
 * Classe permettant de valider les données envoyées
 */
class Validation{
    
    public static function isEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }
        else{
            return FALSE;
        }         
    }
}