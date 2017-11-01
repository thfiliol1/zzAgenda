<?php

global $rep, $vues, $language;
$modAdmin=new ModeleAdministrateur();
$modUser=new ModeleUtilisateur();

$tabConferences = $modUser->donner_conferences();

require ($rep.$vues['admin']);