<?php
global $rep,$vues;

if (Parametre::getParam('email') == NULL || Parametre::getParam('pwd') == NULL){
    $tabMessage["error"]=1;
    $tabMessage["msg"]="Un ou plusieurs champs ne sont pas renseignés.";
}
else{
    $email=$_REQUEST['email'];
    $mdp=$_REQUEST['pwd'];

    if(Validation::isEmail($email)){
        $ModAdmin=new ModeleAdministrateur();
        try{
            $user = $ModAdmin->connexion($email, $mdp);
            $tabMessage["error"]=0;
            $tabMessage["msg"]="Bienvenue ".$user->getPrenom()." :)";
        }
        catch (Exception $e){
            $tabMessage["error"]=1;
            $tabMessage["msg"]=$e->getMessage();
        }
    }
    else{
        $tabMessage["error"]=1;
        $tabMessage["msg"]="Cet email n'est pas valide.";
    }
}

echo json_encode($tabMessage);
