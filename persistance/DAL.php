<?php
/**
 * Classe permettant d'isoler les requêtes SQL et de modéliser les résultats en objet métier
 */
class DAL {
    /**
     * Constructeur de la classe
     */
    public function __construct(){}
    
    public function donner_utilisateur($email){
        $tab = json_decode(file_get_contents("persistance/BDD/utilisateur.json"),TRUE);
        if(array_key_exists($email,$tab)){
            return $tab[$email];
        }
        else{
            return false;
        }        
    }
    
    public function donner_conferences_futur(){
        $tab = json_decode(file_get_contents("persistance/BDD/conference.json"),TRUE);

        foreach ($tab as $key => $conferenceInfo) {
            if($conferenceInfo["date"]>  time()){
                $res[$key]=$conferenceInfo;
            }
        }
        return $res;
    }


    public function donner_conferences(){
        return json_decode(file_get_contents("persistance/BDD/conference.json"),TRUE);
    }

    public function sauvegarder_conferences($tabConf) {
        file_put_contents("persistance/BDD/conference.json", json_encode($tabConf));
    }


    public function sauvegarder_etat_utilisateur($user){
        $tabUser = json_decode(file_get_contents("persistance/BDD/utilisateur.json"),TRUE);
        $tabUser[$user->getEmail()] = $user->expose();
        file_put_contents("persistance/BDD/utilisateur.json", json_encode($tabUser));
    }
    
    public function isLike($idConf, $idEmail){
        $tabLike = json_decode(file_get_contents("persistance/BDD/like.json"),TRUE);
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf && $like["user_id"]==$idEmail){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function getNbLikeOfConference($idConf){
        $tabLike = json_decode(file_get_contents("persistance/BDD/like.json"),TRUE);
        $nbConf = 0;
        foreach ($tabLike as $like){
            if($like["conference_id"]==$idConf){
                $nbConf++;
            }
        }  
        return $nbConf;
    }
    public function getLikes(){
        return json_decode(file_get_contents("persistance/BDD/like.json"),TRUE);
    }
    public function saveLikes($tabLike){
        file_put_contents("persistance/BDD/like.json", json_encode($tabLike));
    }
    
    /** REMPLACER BASEDEDONNee par nos opérations de récupération de données JSON dans un fichier
     * Méthode permettant de récupérer les 5 derniers articles aspirés par le robot de web scraping
     * @return tableau ArticleWeb
     */
  /*  public function donnerDerniersArticles($filtre){
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
    }*/
    
}