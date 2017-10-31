<?php
/**
 * Classe représentant une conférence
 */
class Conference {
    private $date;
    private $titre;
    private $description;
    private $adresse;
    private $speaker;


    public function __construct($date, $titre, $description, $adresse, $speaker) {
        $this->date = $date;
        $this->titre = $titre;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->speaker = $speaker;
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
