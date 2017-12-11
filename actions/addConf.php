<?php
global $rep,$views,$language;

$date=Parameter::getParam('date');
$title=Parameter::getParam('title');
$city=Parameter::getParam('city');
$speaker=Parameter::getParam('speaker');
$description=Parameter::getParam('description');
$date=str_replace('/', '-', $date);


$tabMessage = NULL;
if($date == NULL || $title == NULL || $city == NULL || $speaker == NULL || $description == NULL) {
	$tabMessage["msg"]=$language['many_field_empty'];
} else {
	$ModAdmin=new AdministratorModel();
	$ModAdmin->addConf(strtotime($date),$title,$city,$speaker,$description);
}


echo json_encode($tabMessage);