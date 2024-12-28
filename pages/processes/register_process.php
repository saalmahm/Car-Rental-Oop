<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {

        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $auth = new Authentication($db->getConnection());
        $status = $auth->register($firstName, $lastName, $email, $password, $confirmPassword, 'client');
        if ($status === true) {

            header('Location: ../../index.php');
            exit();
        } else {

            $_SESSION['registerError'] = $status;
            header('Location: ../register.php');
            exit();
        }

    } else { 
        $_SESSION['registerError'] = 'All fields are required';
        header('Location: ../register.php');
        exit();
    }
    

}else{
    header('Location: ../../index.php');
    exit();
}