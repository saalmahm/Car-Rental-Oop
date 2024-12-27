<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

    <!-- Header -->
    <header class="w-full">
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
    <main class="pt-24 px-4">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">

            <div class="hidden md:block p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome to DriveEasy</h1>
                <p class="text-gray-600 text-lg mb-8">Experience the freedom of premium car rentals with personalized
                    service and hassle-free booking.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <i class="fas fa-car text-emerald-500 text-2xl mb-4"></i>
                        <h3 class="font-semibold text-gray-800 mb-2">Premium Fleet</h3>
                        <p class="text-gray-600 text-sm">Choose from our wide selection of luxury and comfort vehicles.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <i class="fas fa-shield-alt text-emerald-500 text-2xl mb-4"></i>
                        <h3 class="font-semibold text-gray-800 mb-2">Safe & Secure</h3>
                        <p class="text-gray-600 text-sm">Fully insured vehicles with 24/7 roadside assistance.</p>
                    </div>
                </div>
            </div>

            <!-- Login Form -->
            <div class="w-full max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Sign In</h2>
                        <p class="text-gray-500">Access your DriveEasy account</p>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                address</label>
                            <div class="relative">
                                <i
                                    class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="email" name="email" id="email" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your email">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <i
                                    class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="password" name="password" id="password" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your password">
                            </div>
                        </div>

                        <!-- <div class="flex items-center justify-between">
              <label class="flex items-center">
                <input type="checkbox"
                  class="rounded border-gray-300 text-emerald-500 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
              </label>
              <a href="#" class="text-sm text-emerald-600 hover:text-emerald-700">Forgot password?</a>
            </div> -->

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-6 py-3 rounded-lg hover:from-emerald-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                            Sign In
                        </button>

                        <div class="text-center mt-6">
                            <p class="text-gray-600 text-sm">
                                Don't have an account?
                                <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium">Create
                                    account</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>