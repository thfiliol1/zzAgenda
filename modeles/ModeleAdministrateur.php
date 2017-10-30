<?php

class ModeleAdministrateur {

    private $dal;
    
    public function __construct(){
	$this->dal = new DAL();
    }
    //EXEMPLE DE CONNEXION 
    public function connexion($email,$mdp){
        global $language;
        $dal=new DAL();
        $userInfo = $dal->getUtilisateur($email);
        if ($userInfo == FALSE){
            throw new Exception($language['email_not_recognized']);
        }
        else{
            $user = new Utilisateur($userInfo["prenom"], 
                                    $userInfo["nom"], 
                                    $userInfo["email"], 
                                    $userInfo["password"],
                                    $userInfo["role"],1);
            
            if(md5($mdp) == $userInfo["password"]){
                if($userInfo["en_ligne"] == 0){
                    $dal->sauvegarder_etat_utilisateur($user);
                    if($userInfo["role"] == "admin"){
                        $_SESSION['role']='admin';
                        $_SESSION['login']=$email;
                    }
                    else{
                        $_SESSION['role']='user';
                        $_SESSION['login']=$email;
                    }
                }
                else{
                    throw new Exception($language['already_connected']);
                }
            }
            else{
                throw new Exception($language['password_not_valid']);
            }
        }
        return $user;
        
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
