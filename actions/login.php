<?php
/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when the home page is started
 */
global $rep, $views, $language,$last_login;

$modUtilisateur = new UserModel();
if(isset($_COOKIE["last_login"])) {
    $last_login=$_COOKIE["last_login"];
} else {
    $last_login="";
}

if (!$modUtilisateur->isAuthentificate()){
    require ($rep.$views['log_in']);
}
else{
    require ($rep.$views['unauthorized']);
}