<?php
//démarrage de la session
session_start();

//chargement de la configuration actuelle
require_once(__DIR__.'/configuration/configuration.php');

//autochargement des classes
require_once(__DIR__.'/configuration/Chargeur.php');
Chargeur::charger();

//var_dump($_SESSION);
//instanciation du contrôleur principal
new ControleurPrincipal();

