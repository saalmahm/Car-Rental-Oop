<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

    <!-- Header -->
    <header class="fixed w-full top-0 z-50">
        <div class="bg-white backdrop-blur-md bg-opacity-90">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between h-20">
                    <div class="flex items-center space-x-4">
                        <div
                            class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-500 text-transparent bg-clip-text">
                            DriveEasy
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen pt-32 pb-16 px-4">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Welcome Message -->
            <div class="hidden md:block p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">Join DriveEasy Today</h1>
                <p class="text-gray-600 text-lg mb-8">Create your account and unlock access to premium vehicles and
                    exclusive member benefits.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <i class="fas fa-gifts text-emerald-500 text-2xl mb-4"></i>
                        <h3 class="font-semibold text-gray-800 mb-2">Member Benefits</h3>
                        <p class="text-gray-600 text-sm">Enjoy special rates and priority booking for our premium
                            vehicles.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <i class="fas fa-clock text-emerald-500 text-2xl mb-4"></i>
                        <h3 class="font-semibold text-gray-800 mb-2">Quick Booking</h3>
                        <p class="text-gray-600 text-sm">Save your preferences for faster reservations.</p>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="w-full max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h2>
                        <p class="text-gray-500">Start your journey with DriveEasy</p>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">First
                                    Name</label>
                                <div class="relative">
                                    <i
                                        class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" name="firstName" id="firstName" required
                                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Last
                                    Name</label>
                                <div class="relative">
                                    <i
                                        class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" name="lastName" id="lastName" required
                                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                address</label>
                            <div class="relative">
                                <i
                                    class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="email" name="email" id="email" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Email@example.com">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <i
                                    class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="password" name="password" id="password" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Create a password">
                            </div>
                        </div>

                        <div>
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">Confirm
                                Password</label>
                            <div class="relative">
                                <i
                                    class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="password" name="confirmPassword" id="confirmPassword" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Confirm your password">
                            </div>
                        </div>

                        <!-- <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="rounded border-gray-300 text-emerald-500 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="ml-3">
                                <label class="text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-emerald-600 hover:text-emerald-700">Terms of Service</a> and <a href="#" class="text-emerald-600 hover:text-emerald-700">Privacy Policy</a>
                                </label>
                            </div>
                        </div> -->

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-6 py-3 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                            Create Account
                        </button>

                        <div class="text-center mt-6">
                            <p class="text-gray-600 text-sm">
                                Already have an account?
                                <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium">Sign in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>