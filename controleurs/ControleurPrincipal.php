<?php
/**
 * Classe reprÃ©sentant le contrÃ´leur principal
 */
class ControleurPrincipal{
    /**
     * Constructeur de la classe permettant d'appeler le bon contrÃ´leur correspondant Ã  l'action 
     * @global String $rep Chemin absolu du rÃ©pertoire contenant le projet
     * @global Array $vues Tableau contenant tous les scripts liÃ©s aux vues 
     */
    function __construct() {  
       global $rep,$vues;
       
       /*
       $user1 = new Utilisateur("Thomas", "Filiol", "thomasfiliol@yahoo.fr", md5("projetWeb"), "admin",0);
       $user2 = new Utilisateur("Stephane", "Valente", "stephanevalente@gmail.com", md5("projetWeb"), "admin",0);
       $user3 = new Utilisateur("Charles", "Dupont", "charlesdupont@gmail.com", md5("charles"), "user",0);
       
       $tabUser[$user1->getEmail()]=$user1->expose();
       $tabUser[$user2->getEmail()]=$user2->expose();
       $tabUser[$user3->getEmail()]=$user3->expose();
       file_put_contents("persistance/BDD/utilisateur.json", json_encode($tabUser));*/
      /*
       $tab = json_decode(file_get_contents("persistance/BDD/utilisateur.json"),TRUE);
       var_dump($tab);*/
       
       /*$conference0 = new Conference("0","1509456619", "Le chabrolisme", "Discussion autour de cette nouvelle religion", "Clermont-Ferrand place de jaude", "Stéphane Valente");
       $conference1 = new Conference("1","1512134224", "Organisation projet", "nous allons parler du déroulement du projet.", "Clermont-Ferrand 23 Rue des Meunier", "Thomas Filiol");
       $conference2 = new Conference("2","1513430224", "Construction du nouveau bâtiment", "nous allons aborder les différents matériaux.", "Saint-Etienne", "Charles Dupont");
       $conference3 = new Conference("3","1544966224", "Cours Web", "Nous regarderons les nouvelles technologies", "Aurillac", "Thomas Filiol");
       $conference4 = new Conference("6","1521206224", "Ouverture de la pêche", "Présentation de la nouvelle réglementation", "Aurillac", "Thomas Filiol");
        
       $tabConf[$conference0->getId()] = $conference0->expose();
       $tabConf[$conference1->getId()] = $conference1->expose();
       $tabConf[$conference2->getId()] = $conference2->expose();
       $tabConf[$conference3->getId()] = $conference3->expose();
       $tabConf[$conference4->getId()] = $conference4->expose();
       file_put_contents("persistance/BDD/conference.json", json_encode($tabConf));*/
       
      /* $tab = json_decode(file_get_contents("persistance/BDD/conference.json"),TRUE);
       var_dump($tab);*/
       /*
       $like1 = new Like("thomasfiliol@yahoo.fr", "2");
       $like2 = new Like("thomasfiliol@yahoo.fr", "1");
       $like3 = new Like("stephanevalente@gmail.com", "2");
       
       $tabLike[] = $like1->expose();
       $tabLike[] = $like2->expose();
       $tabLike[] = $like3->expose();
       file_put_contents("persistance/BDD/like.json", json_encode($tabLike));*/
       
       /*$tab = json_decode(file_get_contents("persistance/BDD/like.json"),TRUE);
       var_dump($tab);*/
       
       
       try{
            //on initialise un tableau d'erreur
            $tabMessages = array ();
            //on rÃ©cupÃ¨re l'action
            if(!isset($_REQUEST['v'])){
                   $action=NULL;
            }
            else{
                $action = $_REQUEST['v'];
            }           

            $modUser=new ModeleUtilisateur();
            
            $tabActionAdministrateur=array('connexion','deconnexion','admin','editConf','addConf','delConf');
            $tabActionUtilisateur=array('log_in','conferences','add_like');
            //on teste si le visiteur est authentifiÃ©
          /*  if($modUser->isAuthentificate()){*/
                if (in_array($action,$tabActionAdministrateur)){
                    $modAdmin=new ModeleAdministrateur();
                    if(!$modAdmin->isAdmin()){
                        global $rep,$vues;
                        switch ($action){
                            case "connexion":
                                new ControleurAdministrateur($action);
                                break;
                            case "deconnexion":
                                new ControleurAdministrateur($action);
                                break;
                            default :
                                new ControleurUtilisateur("log_in");                              
                        }                                        
                    }
                    else{
                        new ControleurAdministrateur($action);
                    }  
                }
                else{
                    if($modUser->isAuthentificate()){
                        new ControleurUtilisateur($action);
                    }
                    else{
                        new ControleurUtilisateur("log_in");
                    }
                }
            /*}
*/

            
        }   catch (PDOException $e){
                    global $rep,$vues;
                    $tabMessages[] = "Impossible de se connecter Ã  la base de donnÃ©es";
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
