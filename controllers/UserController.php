<?php
/**
 * Classe réprésentant le contrôleur d'un utilisateur 
 */
class UserController{
    /**
     * 
     * @global String $rep Chemin absolu du répertoire contenant le projet
     * @global Array $actions Tableau d'action(contenant les scripts php) pouvant être éxécuté par l'utilisateur
     * @param String $action Action de l'utilisateur qui doit être éxécuté
     */
    function __construct($action) {
        global $rep,$actions;
        switch ($action){
            case "login":
                        require ($rep.$actions['login']);
                        break;
            case "conferences":
                        require ($rep.$actions['conferences']);
                        break;   
            case "add_like":
                        require ($rep.$actions['addLike']);
                        break;     
            case "delete_like":
                        require ($rep.$actions['delLike']);
                        break;                    
            default:
                        require ($rep.$actions['login']);
        }
    }    
    
}