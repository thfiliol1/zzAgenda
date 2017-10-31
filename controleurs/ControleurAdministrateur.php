<?php

class ControleurAdministrateur {
    
    function __construct($action) {
        global $rep,$actions;
        switch($action) {
            case "connexion":
                    require ($rep.$actions['connexion']);
                    break;
            case "deconnexion":
                    require ($rep.$actions['deconnexion']);
                    break;
        }
    }
    //EXEMPLE CONNEXION Mettre le corps de la fonction dans une ACTION cf controleur utilisateur
    //Méthode permettant à l'utilisateur de s'identifier (pour devenir Admin)    
   /* function connexion(){
        global $rep,$vues;
        if (!isset($_REQUEST['login']) && !isset($_REQUEST['password'])){
            $tabMessage[]="Action impossible !";
            require ($rep.$vues['oups']);
        }
        else{
            $login=$_REQUEST['login'];
            $mdp=$_REQUEST['password'];
            $tabErreur=array();
            if(Validation::isIdentifiant($login, $mdp, $tabErreur)){
                $ModAdmin=new ModeleAdministrateur();
                try{
                    $ModAdmin->connexion($login, $mdp);
                    require ($rep.$vues['bienvenue']);
                }
                catch (Exception $e){
                    $tabErreur[]=$e->getMessage();
                    require ($rep.$vues['seConnecter']);
                }
            }
            else{
                require ($rep.$vues['seConnecter']);
            }
        }
    }*/
    
    //Méthode permettant à l'utilisateur de se déconnecter   
    function deconnexion(){
        global $rep,$vues;
        $ModAdmin=new ModeleAdministrateur();
        $ModAdmin->deconnexion();
        require ($rep.$vues['deconnexion']);
        
    }
    

}
