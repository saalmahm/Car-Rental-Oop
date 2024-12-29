<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/authentification.php';
require_once '../../classes/admin.php';
require_once '../../classes/car.php';


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

if (isset($_POST['registration'], $_POST['brand'], $_POST['model'])) {

    $registration = trim($_POST['registration']);
    $brand = trim($_POST['brand']);
    $model = trim($_POST['model']);
    $disponibilite = true;

    $car = new Car($registration, $brand, $model, $disponibilite);
    $admin->addCar($car);

    header('Location: ../dashboard.php');
    exit();

} else {

    header('Location: ../../index.php');
    exit();
}

