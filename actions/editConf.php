<?php
global $rep,$vues,$language;

$idConf=$_REQUEST['id'];
$date=$_REQUEST['date'];
$title=$_REQUEST['title'];
$city=$_REQUEST['city'];
$speaker=$_REQUEST['speaker'];
$description=$_REQUEST['description'];

$date=str_replace('/', '-', $date);

$conf = new Conference($idConf,strtotime($date),$title,$description,$city,$speaker);

$ModAdmin=new ModeleAdministrateur();
$ModAdmin->editConf($conf);
