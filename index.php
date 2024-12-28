<?php
session_start();
require_once 'classes/database.php';
require_once 'classes/authentification.php';
require_once 'classes/admin.php';
require_once 'classes/client.php';

$auth = new Authentication($db->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: pages/login.php');
    exit();
} else {

    if ($auth->isAdmin()) {
        $user = new Admin(
            $db->getConnection(),
            $_SESSION['userId'],
            $_SESSION['firstName'],
            $_SESSION['lastName'],
            $_SESSION['email'],
            $_SESSION['role']
        );
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
}

$cars = $user->listDisponibleCars();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Available Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

    <header class="w-full">
        <div class="bg-white backdrop-blur-md bg-opacity-90">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <div
                            class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-500 text-transparent bg-clip-text">
                            DriveEasy
                        </div>
                    </div>

                    <nav class="flex items-center">
                        <ul class="hidden md:flex items-center space-x-6">
                            <li>
                                <a href="#"
                                    class="text-gray-800 font-medium hover:text-emerald-600 transition-colors duration-300">Reservation</a>
                            </li>
                            <li>
                                <a href="pages/reservations.php"
                                    class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Rental
                                    History</a>
                            </li>
                            <li class="relative">
                                <button id="dropdownButton"
                                    class="flex items-center space-x-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full hover:bg-emerald-100 transition-colors duration-300">
                                    <i class="fas fa-user-circle text-lg"></i>
                                    <span><?= $user->getFullName(); ?></span>
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>
                                <div id="dropdownMenu"
                                    class="hidden w-full absolute mt-2 bg-white rounded-xl shadow-lg py-2 border border-gray-100">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">Profile</a>
                                    <?php
                                    if ($user->getRole() == 'admin') {
                                        ?>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">Admin
                                            Dashboard</a>
                                        <?php
                                    }
                                    ?>
                                    <a href="pages/processes/logout.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-red-700">logout</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Available Cars for Reservation</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Choose from our selection of quality vehicles and reserve your perfect ride with just one click.
            </p>
        </div>
    </section>

    <!-- Car List -->
    <main class="px-4 pb-12">
        <div class="max-w-7xl mx-auto">
            <?php
            if (!empty($cars)) {
                ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    foreach ($cars as $car) {
                        ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800"><?= $car['marque'] ?></h3>
                                    <p class="text-gray-600"><?= $car['modele'] ?></p>
                                </div>
                                <div class="text-sm text-gray-500">
                                    Registration: <?= $car['immatriculation'] ?>
                                </div>
                                <button
                                    class="w-full bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-4 py-2 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                                    Reserve Now
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <?php
            } else {
                ?>
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <i class="fas fa-car text-gray-400 text-5xl mb-4"></i>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">No Cars Available</h2>
                        <p class="text-gray-600 mb-8">We currently don't have any cars available for reservation. Please
                            check back later or contact our support team for assistance.</p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>
    <script src="menu.js"></script>
</body>

</html>