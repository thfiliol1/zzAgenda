<?php
/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This class manages the actions of an user
 */

class UserController{
    /**
     * Class constructor which calls the right action based on the parameter
     * @param String $action User action
     * @global String $rep Absolute path of the directory containing the project
     * @global Array $actions Board which contains the actions scripts
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
