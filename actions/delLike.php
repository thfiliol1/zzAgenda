<?php
$modUser=new ModeleUtilisateur();
$id_conf = Parametre::getParam("id_conference");
$modUser->deleteLike($id_conf);
