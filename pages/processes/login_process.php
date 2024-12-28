<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $auth = new Authentication($db->getConnection());
        $status = $auth->login($email, $password);

        if ($status === true) {

            header('Location: ../../index.php');
            exit();
        } else {

            $_SESSION['loginError'] = $status;
            header('Location: ../login.php');
            exit();
        }

    } else {
        $_SESSION['loginError'] = 'All fields are required';
        header('Location: ../login.php');
        exit();
    }

} else {
    header('Location: ../../index.php');
    exit();
}