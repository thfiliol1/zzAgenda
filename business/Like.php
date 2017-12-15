<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Like class
 */

class Like {
    private $user_id;
    private $conference_id;
    
    public function __construct($user_email, $conference_id) {
        $this->user_id = $user_email;
        $this->conference_id = $conference_id;
    }
    
    public function getUser_id() {
        return $this->user_id;
    }

    public function getConference_id() {
        return $this->conference_id;
    }
        
    public function expose() {
        return get_object_vars($this);
    }   
}

