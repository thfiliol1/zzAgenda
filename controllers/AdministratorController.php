<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This class manages the actions of an administrator
 */

class AdministratorController {
    /**
     * Class constructor which calls the right action based on the parameter
     * @param String $action Administration action
     * @global String $rep Absolute path of the directory containing the project
     * @global Array $actions Board which contains the actions scripts
     */
    function __construct($action) {
        global $rep,$actions;
        switch($action) {
            case "connect":
                    require ($rep.$actions['connect']);
                    break;
            case "disconnect":
                    require ($rep.$actions['disconnect']);
                    break;
            case "admin":
                    require ($rep.$actions['admin']);
                    break;
            case "editConf":
                    require ($rep.$actions['editConf']);
                    break;
            case "addConf":
                    require ($rep.$actions['addConf']);
                    break;
            case "delConf":
                    require ($rep.$actions['delConf']);
                    break;
        }
    }
    
    function disconnect(){
        global $rep,$views;
        $ModAdmin=new AdministratorModel();
        $ModAdmin->disconnect();
        require ($rep.$views['disconnect']);    
    }

}
