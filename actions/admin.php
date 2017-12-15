<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an administration goes to the "administration page"
 */

global $rep, $views, $language;
$modAdmin=new AdministratorModel();
$modUser=new UserModel();

$tabConferences = $modUser->get_conferences();
$page="administration";
require ($rep.$views['admin']);