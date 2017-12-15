<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an administration does the action "edit a schedule"
 */

global $rep,$views,$language;

$idConf=htmlentities(Parameter::getParam('id'),ENT_QUOTES,"UTF-8");
$date=htmlentities(Parameter::getParam('date'),ENT_QUOTES,"UTF-8");
$title=htmlentities(Parameter::getParam('title'),ENT_QUOTES,"UTF-8");
$city=htmlentities(Parameter::getParam('city'),ENT_QUOTES,"UTF-8");
$speaker=htmlentities(Parameter::getParam('speaker'),ENT_QUOTES,"UTF-8");
$description=strip_tags(Parameter::getParam('description'),'<b><i><strike><u><ul><ol>');
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

