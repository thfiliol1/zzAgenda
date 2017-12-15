<?php
/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This class manages the actions based on a user's role
 */

class FrontController{
    /**
     * Class constructor which calls the right action based on the user's role
     * @global String $rep Absolute path of the directory containing the project
     * @global Array $views Board which contains the views scripts
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
