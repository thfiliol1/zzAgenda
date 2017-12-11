<?php
$modUser=new UserModel();
$id_conf = Parameter::getParam("id_conference");
$modUser->deleteLike($id_conf);
