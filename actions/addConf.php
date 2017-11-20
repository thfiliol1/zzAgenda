<?php
global $rep,$vues,$language;

$date=Parametre::getParam('date');
$title=Parametre::getParam('title');
$city=Parametre::getParam('city');
$speaker=Parametre::getParam('speaker');
$description=Parametre::getParam('description');
$date=str_replace('/', '-', $date);


$tabMessage = NULL;
if($date == NULL || $title == NULL || $city == NULL || $speaker == NULL || $description == NULL) {
	$tabMessage["msg"]=$language['many_field_empty'];
} else {
	$ModAdmin=new ModeleAdministrateur();
	$ModAdmin->addConf(strtotime($date),$title,$city,$speaker,$description);
}


echo json_encode($tabMessage);