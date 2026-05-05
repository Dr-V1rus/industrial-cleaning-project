<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Oriefi Cleaning') }}</title>

    <!-- Favicon - Simple and working -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- SEO Meta Tags -->
    @isset($seoTitle)
        <x-seo :title="$seoTitle" :description="$seoDescription" :keywords="$seoKeywords" />
    @else
        <x-seo />
    @endisset

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <x-loader :duration="400" />
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="text-2xl font-bold text-blue-700">Oriefi's <span
                        class="text-blue-500">Clean</span></a>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                    <a href="/allservices" class="text-gray-700 hover:text-blue-600 font-medium">Services</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                    @auth
                        <a href="/admin/dashboard" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                    @endauth
                </div>
                <a href="https://wa.me/2348032068718" target="_blank"
                    class="bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition flex items-center gap-2">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white text-center py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; 2026 Oriefi's Cleaning Services. Professional cleaning with industrial-grade equipment.</p>
            <p class="text-gray-400 text-sm mt-2">WhatsApp: +234 803 206 8718</p>
        </div>
    </footer>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>