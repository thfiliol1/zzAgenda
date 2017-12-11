<?php
$modUser=new UserModel();
$id_conf = Parameter::getParam("id_conference");
$modUser->addLike($id_conf);
