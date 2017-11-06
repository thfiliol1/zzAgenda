<?php

class ModeleAdministrateur {

    private $dal;
    
    public function __construct(){
	$this->dal = new DAL();
    }
    //EXEMPLE DE CONNEXION 
    public function connexion($email,$mdp){
        global $language;
        $userInfo = $this->dal->donner_utilisateur($email);
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
                    $this->dal->sauvegarder_etat_utilisateur($user);
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
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=="admin"){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }


    public function deconnexion(){
        $userInfo=$this->dal->donner_utilisateur($_SESSION["login"]);
        
        $user = new Utilisateur($userInfo["prenom"], 
                                    $userInfo["nom"], 
                                    $userInfo["email"], 
                                    $userInfo["password"],
                                    $userInfo["role"],0);
 
        $this->dal->sauvegarder_etat_utilisateur($user);
        session_unset();     
    }  


    public function editConf($conf) {
        $tabConfs = $this->dal->donner_conferences();
        $tabConfs[$conf->getId()]=$conf->expose();
        $this->dal->sauvegarder_conferences($tabConfs);
    }

    public function addConf($date,$title,$city,$speaker,$description) {
        $tabConfs = $this->dal->donner_conferences();
        $keys = array_keys($tabConfs);
        $last_key = $keys[count($keys)-1];
        $newId=$last_key+1;
        $conf=new Conference($newId,$date,$title,$description,$city,$speaker);
        $tabConfs[$conf->getId()]=$conf->expose();
        $this->dal->sauvegarder_conferences($tabConfs);
    }

    public function delConf($id) {
        $tabConfs = $this->dal->donner_conferences();
        unset($tabConfs[$id]);
        $this->dal->sauvegarder_conferences($tabConfs);
    }


    
}
