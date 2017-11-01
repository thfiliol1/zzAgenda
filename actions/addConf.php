<?php
global $rep,$vues,$language;

$date=$_REQUEST['date'];
$title=$_REQUEST['title'];
$city=$_REQUEST['city'];
$speaker=$_REQUEST['speaker'];
$description=$_REQUEST['description'];

$date=str_replace('/', '-', $date);


$ModAdmin=new ModeleAdministrateur();
$ModAdmin->addConf(strtotime($date),$title,$city,$speaker,$description);
