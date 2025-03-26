<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Weather Dashboard - Check current and upcoming weather conditions">
    <title>Weather Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <nav class="bg-blue-600 text-white shadow-lg sticky top-0 z-50" role="navigation" aria-label="Main navigation">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-xl font-bold hover:text-blue-200 transition duration-300 flex items-center gap-2" aria-label="Home">
                    <i class="fas fa-cloud-sun" aria-hidden="true"></i>
                    <span>Weather Dashboard</span>
                </a>
                <div class="flex items-center gap-6">
                    <a href="/" class="hover:text-blue-200 transition duration-300 px-4 py-2 rounded-md">Home</a>
                    <a href="https://google.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-blue-200 transition duration-300 px-4 py-2 rounded-md inline-flex items-center gap-2">
                        Google
                        <i class="fas fa-external-link-alt text-xs" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8" role="main">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-12 mt-auto" role="contentinfo">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left space-y-2">
                    <p class="text-lg">&copy; {{ date('Y') }} Weather Dashboard. All rights reserved.</p>
                    <p class="text-gray-400">Providing accurate weather information</p>
                </div>
                <div class="flex items-center gap-8">
                    <a href="#" class="hover:text-blue-400 transition duration-300" aria-label="Follow us on Twitter">
                        <i class="fab fa-twitter text-2xl" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600 transition duration-300" aria-label="Follow us on Facebook">
                        <i class="fab fa-facebook text-2xl" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="hover:text-pink-600 transition duration-300" aria-label="Follow us on Instagram">
                        <i class="fab fa-instagram text-2xl" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
