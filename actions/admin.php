<?php
global $rep, $views, $language;
$modAdmin=new AdministratorModel();
$modUser=new UserModel();

$tabConferences = $modUser->get_conferences();
$page="administration";
require ($rep.$views['admin']);