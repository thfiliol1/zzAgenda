<?php
/**
 * Classe représentant un utilisateur
 */
class Utilisateur {
    private $prenom;
    private $nom;
    private $email;
    private $password;
    private $role;
    private $en_ligne;
    
    public function __construct($prenom, $nom, $email, $password, $role, $en_ligne) {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->en_ligne = $en_ligne;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function getNom(){
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }
    
    public function getEn_ligne() {
        return $this->en_ligne;
    }
    
    public function expose() {
        return get_object_vars($this);
    }
    
}

