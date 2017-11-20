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


    public function creer_tableau_conferences($conferencesInfo) {
        $idEmail = $this->getLoginUserConnected();
        
        foreach ($conferencesInfo as $key => $conferenceInfo) {
            $nbLike = $this->dal->getNbLikeOfConference($conferenceInfo["id"]);
            $canLike = $this->dal->isLike($conferenceInfo["id"], $idEmail); 
            $conf = new Conference($conferenceInfo["id"],
                                                $conferenceInfo["date"], 
                                               $conferenceInfo["titre"],
                                               $conferenceInfo["description"], 
                                               $conferenceInfo["adresse"] , 
                                               $conferenceInfo["speaker"]);
            $tabConferences[] = array("conference" => $conf, "userCanLike" => $canLike, "nbLike" => $nbLike);
        }
        return $tabConferences;
    }
    
    public function addLike($id_conf){
        $idEmail = $this->getLoginUserConnected();
        $tabLike = $this->dal->getLikes();
        $like = new Like($idEmail, $id_conf);
        $tabLike[] = $like->expose();
        $this->dal->saveLikes($tabLike);
    }
    
    public function deleteLike($id_conf){
        $idEmail = $this->getLoginUserConnected();
        $tabLike = $this->dal->getLikes();
        $tabLikeNew = array();
        foreach ($tabLike as $like){
            if($like["conference_id"]==$id_conf && $like["user_id"]==$idEmail){
            }
            else{
                $tabLikeNew[] = $like;
            }
            
        }
        
        $this->dal->saveLikes($tabLikeNew);        
    }


    public function isAuthentificate(){
        if(isset($_SESSION['role'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function getLoginUserConnected(){
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
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
