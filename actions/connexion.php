<?php
global $rep,$vues,$language;

if (Parametre::getParam('email') == NULL || Parametre::getParam('pwd') == NULL){
    $tabMessage["error"]=1;
    $tabMessage["msg"]=$language['many_field_empty'];
}
else{
    $email=$_REQUEST['email'];
    $mdp=$_REQUEST['pwd'];

    if(Validation::isEmail($email)){
        $ModAdmin=new ModeleAdministrateur();
        try{
            $user = $ModAdmin->connexion($email, $mdp);
            $tabMessage["error"]=0;
            $tabMessage["msg"]=$language['welcome'].$user->getPrenom()." :)";
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
