<?php
/**
 * Classe permettant d'isoler les requêtes SQL et de modéliser les résultats en objet métier
 */
class DAL {
    /**
     * Constructeur de la classe
     */
    public function __construct(){}
    
    /** REMPLACER BASEDEDONNee par nos opérations de récupération de données JSON dans un fichier
     * Méthode permettant de récupérer les 5 derniers articles aspirés par le robot de web scraping
     * @return tableau ArticleWeb
     */
    public function donnerDerniersArticles($filtre){
        if($filtre == "date_publication"){
            $req = "SELECT * FROM articleweb ORDER BY date_submitted desc LIMIT 5";
        }
        else{
            $req = "SELECT * FROM articleweb ORDER BY date_aspirated desc LIMIT 5";
        }
        $param = array();
        BaseDeDonnee::getInstance()->prepareEtExecuteRequete($req,$param);
        $articlesRes = BaseDeDonnee::getInstance()->getResultat();
        foreach ($articlesRes as $article) {
            $tabArticles[] = new ArticleWeb($article['id'], $article['title'], $article['url'], 
                                            $article['source'], $article['text'], 
                                            $article['date_submitted'], $article['date_aspirated']);
        }
        BaseDeDonnee::getInstance()->detruireResultatRequete();
        return $tabArticles;
    }
    
}
