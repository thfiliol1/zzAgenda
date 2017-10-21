<?php

class ModeleAdministrateur {

    private $dal;
    
    public function __construct(){
	$this->dal = new DAL();
    }
    //EXEMPLE DE CONNEXION 
    public function connexion($login,$mdp){
        $dal=new DAL();
        $nb=$dal->isInBase($login,$mdp);
        if($nb==1){
            $_SESSION['role']='Admin';
            $_SESSION['login']=$login;
        }
        else{
            throw new Exception("Pseudo ou Login incorrect !");
        }
        
    }
    
    public function isAdmin(){
        if(isset($_SESSION['role']) && isset($_SESSION['login'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function deconnexion(){
        session_unset();
    }  
    
}
