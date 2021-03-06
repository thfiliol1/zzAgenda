<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an user tries to connect
 */

global $rep,$views,$language;

if (Parameter::getParam('email') == NULL || Parameter::getParam('pwd') == NULL){
    $tabMessage["error"]=1;
    $tabMessage["msg"]=$language['many_field_empty'];
}
else{
    $email=$_REQUEST['email'];
    $mdp=$_REQUEST['pwd'];

    if(Validation::isEmail($email)){
        $ModAdmin=new AdministratorModel();
        try{
            $user = $ModAdmin->connect($email, $mdp);
            $tabMessage["error"]=0;
            setcookie("last_login", $email);
            $tabMessage["msg"]=$language['welcome'].$user->getFirstname()." :)";
        }
        catch (Exception $e){
            $tabMessage["error"]=1;
            $tabMessage["msg"]=$e->getMessage();
        }
    }
    else{
        $tabMessage["error"]=1;
        $tabMessage["msg"]=$language['email_not_valid'];
    }
}

echo json_encode($tabMessage);
