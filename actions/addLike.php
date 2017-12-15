<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an administration does the action "add a like"
 */

$modUser=new UserModel();
$id_conf = Parameter::getParam("id_conference");
$modUser->addLike($id_conf);
