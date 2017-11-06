<?php
/**
 * Classe représentant une conférence
 */
class Conference {
    private $id;
    private $date;
    private $titre;
    private $description;
    private $adresse;
    private $speaker;


    public function __construct($id,$date, $titre, $description, $adresse, $speaker) {
        $this->id = $id;
        $this->date = $date;
        $this->titre = $titre;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->speaker = $speaker;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getDate(){
        return $this->date;
    }
    
    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getSpeaker() {
        return $this->speaker;
    }
    
    public function expose() {
        return get_object_vars($this);
    }    
}
