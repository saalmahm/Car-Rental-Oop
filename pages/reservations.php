<?php
session_start();
require_once '../classes/database.php';
require_once '../classes/authentification.php';
require_once '../classes/admin.php';
require_once '../classes/client.php';

$auth = new Authentication($db->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: login.php');
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Rental History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Header -->
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
                                <a href="../index.php"
                                    class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Reservation</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-gray-800 font-medium hover:text-emerald-600 transition-colors duration-300">Rental
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
                                    <?php if ($user->getRole() == 'admin'): ?>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">Admin
                                            Dashboard</a>
                                    <?php endif; ?>
                                    <a href="processes/logout.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-red-700">logout</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Your Rental History</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                View all your past and current reservations with DriveEasy.
            </p>
        </div>
    </section>

    <!-- Rental History Table -->
    <main class="px-4 pb-12">
        <div class="max-w-7xl mx-auto">
            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Brand</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Model</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Start Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">End Date</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">BMW</td>
                                <td class="px-6 py-4 text-sm text-gray-800">X5</td>
                                <td class="px-6 py-4 text-sm text-gray-600">2024-01-15</td>
                                <td class="px-6 py-4 text-sm text-gray-600">2024-01-20</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">Mercedes-Benz</td>
                                <td class="px-6 py-4 text-sm text-gray-800">C-Class</td>
                                <td class="px-6 py-4 text-sm text-gray-600">2024-02-01</td>
                                <td class="px-6 py-4 text-sm text-gray-600">2024-02-05</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- No Reservations Section (Hidden by default) -->
            <div class="hidden text-center py-16">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-calendar-times text-gray-400 text-5xl mb-4"></i>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">No Reservations Yet</h2>
                    <p class="text-gray-600 mb-8">You haven't made any reservations with us yet. Start your journey with
                        DriveEasy today!</p>
                    <a href="../index.php"
                        class="inline-block bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-6 py-3 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                        Make Your First Reservation
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="../menu.js"></script>
</body>

</html>