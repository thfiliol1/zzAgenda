<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an user goes to the "schedules page"
 */

global $rep, $views, $language;
$modAdmin=new AdministratorModel();
$modUser=new UserModel();
$tabConferences = $modUser->get_future_conferences();

$page="schedules";
require ($rep.$views['conferences']);

