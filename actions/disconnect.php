<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an user tries to disconnect
 */

global $rep,$views,$language;

$ModAdmin=new AdministratorModel();
$ModAdmin->disconnect();


