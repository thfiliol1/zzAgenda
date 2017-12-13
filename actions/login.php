<?php
/** CECI EST UN EXEMPLE
 * Script exécuté lors de l'appel de la page accueil
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