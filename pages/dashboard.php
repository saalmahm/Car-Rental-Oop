<?php
session_start();
require_once '../classes/database.php';
require_once '../classes/authentification.php';
require_once '../classes/admin.php';
$auth = new Authentication($db->getConnection());

if (!$auth->isAdmin()) {
    header('Location: profile.php');
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
$users = $admin->listUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Dashboard</title>
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
                                    <span><?= $admin->getFullName(); ?></span>
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>
                                <div id="dropdownMenu"
                                    class="hidden w-full absolute mt-2 bg-white rounded-xl shadow-lg py-2 border border-gray-100">
                                    <a href="profile.php"
                                        class="block px-4 py-2 text-sm text-gray-800 font-medium hover:bg-emerald-50 hover:text-emerald-700">Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">Admin
                                        Dashboard</a>

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

    <main class="flex h-screen bg-gray-50">

        <aside class="w-64 bg-white shadow-lg">
            <div class="h-full flex flex-col">

                <div class="px-4 py-6 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Admin Dashboard</h2>
                </div>

                <div class="flex-1 py-4" id="sideBar">
                    <div class="px-4 space-y-1">
                        <button data-section="overview"
                            class="w-full flex items-center px-4 py-3 text-gray-700 bg-emerald-50 rounded-lg">
                            <i class="fas fa-chart-line w-5 h-5 text-emerald-500"></i>
                            <span class="mx-4 font-medium">Overview</span>
                        </button>

                        <button data-section="manageUsers"
                            class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-users w-5 h-5"></i>
                            <span class="mx-4 font-medium">Manage Users</span>
                        </button>

                        <button data-section="manageCars"
                            class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-car w-5 h-5"></i>
                            <span class="mx-4 font-medium">Manage Cars</span>
                        </button>

                        <button data-section="manageContracts"
                            class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-file-contract w-5 h-5"></i>
                            <span class="mx-4 font-medium">Manage Contracts</span>
                        </button>
                    </div>
                </div>
            </div>
        </aside>

        <section id="overview" class="contentSection flex-1 flex flex-col overflow-hidden">
            <div class="bg-white shadow-sm">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h1>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-6">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <p class="text-gray-600">Select a section from the sidebar to manage your application.</p>
                </div>
            </div>
        </section>

        <section id="manageUsers" class="hidden contentSection flex-1 flex-col overflow-hidden">
            <div class="bg-white shadow-sm">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">Manage Users</h1>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">First Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Last Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Email</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Role</th>
                                    <th class="px-6 py-4 text-right text-sm font-semibold text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">

                                <?php foreach ($users as $user) { ?>
                                    <tr
                                        class="hover:bg-gradient-to-r hover:from-emerald-50 hover:to-transparent transition-all duration-300 border-l-4 border-transparent hover:border-emerald-500">
                                        <td class="px-6 py-4 text-sm text-gray-800 font-medium"><?= $user['firstName'] ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800"><?= $user['lastName'] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-600"><?= $user['email'] ?></td>
                                        <td class="px-6 py-4 text-sm">
                                            <span
                                                class="inline-flex items-center px-3 py-1 text-sm rounded-full <?= $user['role'] === 'admin' ? 'bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-700' : 'bg-gray-100 text-gray-700' ?>">
                                                <?= ucfirst($user['role']) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right space-x-3">
                                            <?php if ($user['role'] !== 'admin') { ?>
                                                <form action="processes/promote_user.php" method="POST" class="inline">
                                                    <button type="submit" name="user_id" value="<?= $user['id'] ?>"
                                                        class="px-4 py-1.5 text-sm bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-lg hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow">
                                                        Promote to Admin
                                                    </button>
                                                </form>
                                            <?php } ?>
                                            <form action="processes/delete_user.php" method="POST" class="inline">
                                                <button type="submit" name="user_id" value="<?= $user['id'] ?>"
                                                    class="px-4 py-1.5 text-sm bg-white border border-red-200 text-red-600 rounded-lg hover:bg-red-50 transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if (empty($users)) { ?>
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-users text-gray-400 text-5xl mb-4"></i>
                                <h2 class="text-2xl font-semibold text-gray-800 mb-2">No Users Found</h2>
                                <p class="text-gray-600">There are currently no users in the system.</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    </main>

    <script src="dashboard.js"></script>
    <script src="../menu.js"></script>
</body>

</html>

</body>

</html>