<?php
global $rep,$vues,$language;

$id=Parametre::getParam('id');

$ModAdmin=new ModeleAdministrateur();
$ModAdmin->delConf($id);
