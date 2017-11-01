<?php
global $rep,$vues,$language;

$id=$_REQUEST['id'];

$ModAdmin=new ModeleAdministrateur();
$ModAdmin->delConf($id);
