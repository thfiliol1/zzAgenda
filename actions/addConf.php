<?php
global $rep,$views,$language;

$date=htmlentities(Parameter::getParam('date'),ENT_QUOTES,"UTF-8");
$title=htmlentities(Parameter::getParam('title'),ENT_QUOTES,"UTF-8");
$city=htmlentities(Parameter::getParam('city'),ENT_QUOTES,"UTF-8");
$speaker=htmlentities(Parameter::getParam('speaker'),ENT_QUOTES,"UTF-8");
$description=strip_tags(Parameter::getParam('description'),'<b><i><strike><u><ul><ol>');
$date=str_replace('/', '-', $date);


$tabMessage = NULL;
if($date == NULL || $title == NULL || $city == NULL || $speaker == NULL || $description == NULL) {
	$tabMessage["msg"]=$language['many_field_empty'];
} else {
	$ModAdmin=new AdministratorModel();
	$ModAdmin->addConf(strtotime($date),$title,$city,$speaker,$description);
}


echo json_encode($tabMessage);