<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an administration does the action "delete a schedule"
 */

global $rep,$views,$language;

$id=Parameter::getParam('id');

$ModAdmin=new AdministratorModel();
$ModAdmin->delConf($id);
