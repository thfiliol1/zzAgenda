<?php
//démarrage de la session
session_start();
//AIzaSyDYquPRb7Zc_Jp405LMhQOFSuRP5VBPPgk
//chargement de la configuration actuelle
require_once(__DIR__.'/configuration/configuration.php');

//autochargement des classes
require_once(__DIR__.'/configuration/Chargeur.php');
Chargeur::charger();

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

//var_dump($_SESSION);
//instanciation du contrôleur principal
new ControleurPrincipal();

