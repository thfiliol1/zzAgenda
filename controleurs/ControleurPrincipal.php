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
       global $rep,$vues;
        try{
            //on initialise un tableau d'erreur
            $tabMessages = array ();
            //on récupère l'action
            if(!isset($_REQUEST['v'])){
                   $action=NULL;
            }
            else{
                $action = $_REQUEST['v'];
            }           


            
            $tabActionAdministrateur=array('connexion','deconnexion');
            $tabActionUtilisateur=array('log_in');
            //on teste si le visiteur est authentifié
            if(isset($_SESSION['role'])){
                if (in_array($action,$tabActionAdministrateur)){
                    $modAdmin=new ModeleAdministrateur();
                    if(!$modAdmin->isAdmin()){
                        global $rep,$vues;
                        switch ($action){
                            case "connexion":
                                new ControleurAdministrateur($action);
                                break;
                            default :
                                require $rep.$vues['log_in'];
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
            }
            else{
              //require $rep.$vues['log_in'];
               require ($rep.$vues['administrate']);
               //require $rep.$vues['conference']; 
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
