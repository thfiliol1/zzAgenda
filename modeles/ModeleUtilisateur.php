<?php
/**
 * Classe modélisant toutes les méthodes pouvant être appelé par un utilisateur 
 */
class ModeleUtilisateur {

    private $dal;
    /**
     * Constructeur de la classe
     */
    public function __construct(){
	$this->dal = new DAL();
    }
    
    public function donner_conferences_futur(){
        $conferencesInfo = $this->dal->donner_conferences_futur();
        return $this->creer_tableau_conferences($conferencesInfo);
    }

    public function donner_conferences(){
        $conferencesInfo = $this->dal->donner_conferences();
        return $this->creer_tableau_conferences($conferencesInfo);
    }


    private function creer_tableau_conferences($conferencesInfo) {
        
        foreach ($conferencesInfo as $key => $conferenceInfo) {
            $conf = new Conference($conferenceInfo["id"],
                                                $conferenceInfo["date"], 
                                               $conferenceInfo["titre"],
                                               $conferenceInfo["description"], 
                                               $conferenceInfo["adresse"] , 
                                               $conferenceInfo["speaker"]);
            $tabConferences[] = array("conference" => $conf);
        }
        return $tabConferences;
    }

    public function isAuthentificate(){
        if(isset($_SESSION['role'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function isUser(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=="user"){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }
    
    
    /** CECI EST UN EXEMPLE
     * Méthode permettant de récupérer les derniers Article Web 
     * @return tableau ArticleWeb 
     */
    public function donnerDerniersArticles($filtre){
        $tabArticles = $this->dal->donnerDerniersArticles($filtre);
        foreach ($tabArticles as $Article) {
            $tabMotsClefs = $this->donnerMotsClefsArticle($Article->getId());
            $Article->setMots_cles($tabMotsClefs);
        }
        return $tabArticles;
    }
}
