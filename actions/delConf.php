<?php
global $rep,$views,$language;

$id=Parameter::getParam('id');

$ModAdmin=new AdministratorModel();
$ModAdmin->delConf($id);
