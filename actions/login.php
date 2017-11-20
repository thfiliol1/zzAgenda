<?php
/** CECI EST UN EXEMPLE
 * Script exécuté lors de l'appel de la page accueil
 */
global $rep, $vues, $language;
/*$p_choix = Parametre::getParam("choix");
switch ($p_choix) {
    case 1:
        $filtre = "date_aspiration";
        break;
    case 2:
        $filtre = "date_publication";
        break;
    default:
        $filtre = "date_aspiration";
        break;
}

$modUtilisateur = new ModeleUtilisateur();
$tabArticles = $modUtilisateur->donnerDerniersArticles($filtre);
if($p_choix != null){
    require ($rep.$vues['accueilDernieresDepeches']);
}
else{
    require ($rep.$vues['accueil']);
}
*/
$modUtilisateur = new ModeleUtilisateur();
if (!$modUtilisateur->isAuthentificate()){
    require ($rep.$vues['log_in']);
}
else{
    require ($rep.$vues['unauthorized']);
}