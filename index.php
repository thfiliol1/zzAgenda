<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * 
 */

session_start();

require_once(__DIR__.'/configuration/configuration.php');

require_once(__DIR__.'/configuration/Loader.php');
Loader::load();

if(isset($_COOKIE["lang"])){
    switch ($_COOKIE["lang"]){
         case "fr":
             require_once(__DIR__.'/lang/fr.php');
             break;
         case "en":
             require_once(__DIR__.'/lang/en.php');
             break;
         default :
             require_once(__DIR__.'/lang/fr.php');
     } 
}
else{
    require_once(__DIR__.'/lang/fr.php');
}


new FrontController();

