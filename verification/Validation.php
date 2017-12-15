<?php
/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Class which checks data format
 */
class Validation{
    
    /**
     * Function which check email format
     * @param String $email User email
     * @return Boolean True if the email format is correct
     */
    public static function isEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }
        else{
            return FALSE;
        }         
    }
}