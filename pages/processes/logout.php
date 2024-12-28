<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';

$auth = new Authentication($db->getConnection());

$auth->logout();

header('Location: ../../index.php');
exit();