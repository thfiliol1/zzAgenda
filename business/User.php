<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * User class
 */

class User {
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;
    private $online;
    
    public function __construct($firstname, $lastname, $email, $password, $role, $online) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->online = $online;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }
    
    public function getLastName(){
        return $this->lastname;
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
    
    public function getOnline() {
        return $this->online;
    }
    
    public function expose() {
        return get_object_vars($this);
    }
    
}

