<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script is called when an administration does the action "delete a like"
 */

$modUser=new UserModel();
$id_conf = Parameter::getParam("id_conference");
$modUser->deleteLike($id_conf);
