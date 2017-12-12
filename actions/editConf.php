<?php
global $rep,$views,$language;

$idConf=htmlentities(Parameter::getParam('id'),ENT_QUOTES);
$date=htmlentities(Parameter::getParam('date'),ENT_QUOTES);
$title=htmlentities(Parameter::getParam('title'),ENT_QUOTES);
$city=htmlentities(Parameter::getParam('city'),ENT_QUOTES);
$speaker=htmlentities(Parameter::getParam('speaker'),ENT_QUOTES);
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

