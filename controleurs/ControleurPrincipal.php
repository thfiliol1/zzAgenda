<?php
/**
 * Classe représentant le contrôleur principal
 */
class ControleurPrincipal{
    /**
     * Constructeur de la classe permettant d'appeler le bon contrôleur correspondant à l'action 
     * @global String $rep Chemin absolu du répertoire contenant le projet
     * @global Array $vues Tableau contenant tous les scripts liés aux vues 
     */
    function __construct() {  
        
        try{
            //on initialise un tableau d'erreur
            $tabMessages = array ();
            //on récupère l'action
            if(!isset($_REQUEST['action'])){
                   $action=NULL;
            }
            else{
                $action = $_REQUEST['action'];
            }


            
            $tabActionAdministrateur=array('connexion','deconnexion');
            $tabActionUtilisateur=array('accueil');
            
	    if (in_array($action,$tabActionAdministrateur)){
                $modAdmin=new ModeleAdministrateur();
                if(!$modAdmin->isAdmin()){
                    global $rep,$vues;
                    switch ($action){
                        case "connexion":
                            new ControleurAdministrateur($action);
                            break;
                        default :
                            require $rep.$vues['seConnecter'];
                            break;
                            
                    }                                        
                }
                else{
                    new ControleurAdministrateur($action);
                }  
            }
            else{
               new ControleurUtilisateur($action);
            }
            
        }   catch (PDOException $e){
                    global $rep,$vues;
                    $tabMessages[] = "Impossible de se connecter à la base de données";
                    require ($rep.$vues['erreur']);
                }
                catch (Exception $e2){
                    global $rep,$vues;
                    $tabMessages[] =$e2->getMessage();
                    require ($rep.$vues['erreur']);
                }
                
            exit(0);      
    }
     
}
