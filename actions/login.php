<?php
/** CECI EST UN EXEMPLE
 * Script exécuté lors de l'appel de la page accueil
 */
global $rep, $views, $language;

$modUtilisateur = new UserModel();
if (!$modUtilisateur->isAuthentificate()){
    require ($rep.$views['log_in']);
}
else{
    require ($rep.$views['unauthorized']);
}