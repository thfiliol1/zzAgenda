<?php

class AdministratorController {
    
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
    
    //Méthode permettant à l'utilisateur de se déconnecter   
    function disconnect(){
        global $rep,$views;
        $ModAdmin=new AdministratorModel();
        $ModAdmin->disconnect();
        require ($rep.$views['disconnect']);    
    }

}
