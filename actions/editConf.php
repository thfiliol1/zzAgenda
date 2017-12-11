<?php
global $rep,$views,$language;

$idConf=Parameter::getParam('id');
$date=Parameter::getParam('date');
$title=Parameter::getParam('title');
$city=Parameter::getParam('city');
$speaker=Parameter::getParam('speaker');
$description=Parameter::getParam('description');
$date=str_replace('/', '-', $date);

$tabMessage = NULL;
if($idConf == NULL || $date == NULL || $title == NULL || $city == NULL || $speaker == NULL || $description == NULL) {
	$tabMessage["msg"]=$language['many_field_empty'];
} else {
	$conf = new Conference($idConf,strtotime($date),$title,$description,$city,$speaker);
	$ModAdmin=new AdministratorModel();
	$ModAdmin->editConf($conf);
}

echo json_encode($tabMessage);

