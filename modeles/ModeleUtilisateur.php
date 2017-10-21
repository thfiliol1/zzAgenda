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
