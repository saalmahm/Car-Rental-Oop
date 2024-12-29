<?php
session_start();
require_once 'classes/database.php';
require_once 'classes/client.php';
require_once 'classes/authentification.php';
require_once 'classes/contract.php';

$auth = new Authentication($db->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: login.php');
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
    if (isset($_POST['carId']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        $carId = $_POST['carId'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $newContract = new Contract($user->getId(),$carId, $startDate, $endDate );
        $user->reserveCar($newContract);
        header('Location: pages/reservations.php');
        exit();

    }
} else {

    header('Location: index.php');
    exit();
}
