<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';
require_once '../../classes/admin.php';

$auth = new Authentication($db->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: ../../index.php');
    exit();
}

if (!$auth->isAdmin()) {
    header('Location: ../profile.php');
    exit();

} else {
    $admin = new Admin(
        $db->getConnection(),
        $_SESSION['userId'],
        $_SESSION['firstName'],
        $_SESSION['lastName'],
        $_SESSION['email'],
        $_SESSION['role']
    );
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user_id'])) {

        $user_id = $_POST['user_id'];
        $admin->delUser($user_id);
        header('Location: ../dashboard.php');
        exit();
    }

} else {

    header('Location: ../../index.php');
    exit();
}

