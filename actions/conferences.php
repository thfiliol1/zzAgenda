<?php
global $rep, $views, $language;
$modAdmin=new AdministratorModel();
$modUser=new UserModel();
$tabConferences = $modUser->get_future_conferences();

$page="schedules";
require ($rep.$views['conferences']);

