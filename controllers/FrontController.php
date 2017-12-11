<?php
/**
 * Classe reprÃ©sentant le contrÃ´leur principal
 */
class FrontController{
    /**
     * Constructeur de la classe permettant d'appeler le bon contrÃ´leur correspondant Ã  l'action 
     * @global String $rep Chemin absolu du rÃ©pertoire contenant le projet
     * @global Array $views Tableau contenant tous les scripts liÃ©s aux vues 
     */
    function __construct() {  
       global $rep,$views;    
       
       try{
            //on initialise un tableau d'erreur
            $tabMessages = array ();
            //on rÃ©cupÃ¨re l'action
            if(!isset($_REQUEST['v'])){
                   $action="conferences";
            }
            else{
                $action = $_REQUEST['v'];
            }           

            $modUser=new UserModel();
            
            $tabActionAdministrateur=array('connect','disconnect','admin','editConf','addConf','delConf');
            $tabActionUtilisateur=array('log_in','conferences','add_like');
            //on teste si le visiteur est authentifiÃ©
            if (in_array($action,$tabActionAdministrateur)){
                $modAdmin=new AdministratorModel();
                if(!$modAdmin->isAdmin()){
                    global $rep,$views;
                    switch ($action){
                        case "connect":
                            new AdministratorController($action);
                            break;
                        case "disconnect":
                            new AdministratorController($action);
                            break;
                        default :
                            new UserController("log_in");                              
                    }                                        
                }
                else{
                    new AdministratorController($action);
                }  
            }
            else{
                if($modUser->isAuthentificate()){
                    new UserController($action);
                }
                else{
                    new UserController("log_in");
                }
            }

            
        } 
        catch (Exception $e2){
            global $rep,$views;
            $tabMessages[] =$e2->getMessage();
            require ($rep.$views['erreur']);
        }    
    }
     
}
