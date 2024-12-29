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
    <title>DriveEasy - Profile</title>
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
                                <a href="../index.php"
                                    class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Reservation</a>
                            </li>
                            <li>
                                <a href="reservations.php"
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
                                        class="block px-4 py-2 text-sm text-gray-800 font-medium hover:bg-emerald-50 hover:text-emerald-700">Profile</a>
                                    <?php if ($user->getRole() == 'admin') { ?>
                                        <a href="dashboard.php"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">Admin
                                            Dashboard</a>
                                    <?php } ?>
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

    <!-- Profile -->
    <main class="py-12 px-4">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                    <h1 class="text-xl font-semibold text-gray-800">Profile Information</h1>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">First Name</label>
                            <p class="text-gray-800 font-medium"><?= $user->getFirstName(); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Last Name</label>
                            <p class="text-gray-800 font-medium"><?= $user->getLastName(); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                            <p class="text-gray-800"><?= $user->getEmail(); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Role</label>
                            <p class="text-gray-800 capitalize"><?= $user->getRole(); ?></p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button id="updateProfileBtn"
                            class="bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-6 py-2 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                            Update Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- update -->
    <div id="formPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg max-w-md w-full">
            <div class="rounded-xl bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">Update Profile</h3>
                <button id="closeForm" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="p-6">
                <form id="updateProfileForm" class="space-y-4" action="processes/update_profile.php" method="POST">
                    <div>
                        <label for="updateFirstName" class="block text-sm font-medium text-gray-700 mb-2">First
                            Name</label>
                        <input type="text" id="updateFirstName" name="firstName" required
                            value="<?= $user->getFirstName(); ?>"
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300">
                    </div>

                    <div>
                        <label for="updateLastName" class="block text-sm font-medium text-gray-700 mb-2">Last
                            Name</label>
                        <input type="text" id="updateLastName" name="lastName" required
                            value="<?= $user->getLastName(); ?>"
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300">
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-6 py-3 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="profile.js"></script>
    <script src="../menu.js"></script>
</body>

</html>