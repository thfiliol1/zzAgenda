<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script link files into a board in order to facilitate file calls
 */

$rep=__DIR__.'/../';

//Actions
$actions['login']='actions/login.php';
$actions['connect']='actions/connect.php';
$actions['disconnect']='actions/disconnect.php';
$actions['conferences']='actions/conferences.php';
$actions['admin']='actions/admin.php';
$actions['editConf']='actions/editConf.php';
$actions['addConf']='actions/addConf.php';
$actions['delConf']='actions/delConf.php';
$actions['addLike']='actions/addLike.php';
$actions['delLike']='actions/delLike.php';

//Views
$views['log_in']='views/LoginView.php';
$views['admin']='views/AdminView.php';
$views['conferences']='views/ConferenceView.php';
$views['unauthorized']='views/UnauthorizedView.php';