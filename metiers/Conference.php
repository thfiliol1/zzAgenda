<?php
/**
 * Classe représentant un hôte
 */
class Conference {
    private $nom;
    
    public function __construct($nom) {
        $this->nom = $nom;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
}
