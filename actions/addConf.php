<?php
global $rep,$views,$language;

$date=htmlentities(Parameter::getParam('date'),ENT_QUOTES);
$title=htmlentities(Parameter::getParam('title'),ENT_QUOTES);
$city=htmlentities(Parameter::getParam('city'),ENT_QUOTES);
$speaker=htmlentities(Parameter::getParam('speaker'),ENT_QUOTES);
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