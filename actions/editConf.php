<?php
global $rep,$vues,$language;

$idConf=Parametre::getParam('id');
$date=Parametre::getParam('date');
$title=Parametre::getParam('title');
$city=Parametre::getParam('city');
$speaker=Parametre::getParam('speaker');
$description=Parametre::getParam('description');
$date=str_replace('/', '-', $date);

$tabMessage = NULL;
if($idConf == NULL || $date == NULL || $title == NULL || $city == NULL || $speaker == NULL || $description == NULL) {
	$tabMessage["msg"]=$language['many_field_empty'];
} else {
	$conf = new Conference($idConf,strtotime($date),$title,$description,$city,$speaker);
	$ModAdmin=new ModeleAdministrateur();
	$ModAdmin->editConf($conf);
}

echo json_encode($tabMessage);

