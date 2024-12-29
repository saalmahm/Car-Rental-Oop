<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';
require_once '../../classes/client.php';

$auth = new Authentication($db->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: ../login.php');
    exit();
} else {

    $user = new Client(
        $db->getConnection(),
        $_SESSION['userId'],
        $_SESSION['firstName'],
        $_SESSION['lastName'],
        $_SESSION['email'],
        $_SESSION['role']
    );
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);

        $user->editInfo($firstName, $lastName);
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        header('Location: ../profile.php');
        exit();
    }
} else {

    header('Location: ../profile.php');
    exit();
}