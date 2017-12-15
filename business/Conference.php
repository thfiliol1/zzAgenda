<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Schedule class
 */

class Conference {
    private $id;
    private $date;
    private $title;
    private $description;
    private $address;
    private $speaker;


    public function __construct($id,$date, $title, $description, $address, $speaker) {
        $this->id = $id;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
        $this->address = $address;
        $this->speaker = $speaker;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getDate(){
        return $this->date;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getSpeaker() {
        return $this->speaker;
    }
    
    public function expose() {
        return get_object_vars($this);
    }    
}
