<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Oriefi's Cleaning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #1e3a5f 0%, #2c7da0 100%); }
        .service-card:hover { transform: translateY(-5px); transition: all 0.3s ease; }
    </style>
</head>
<body class="bg-white">

<!-- Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="/" class="text-2xl font-bold text-blue-700">Oriefi's <span class="text-blue-500">Clean</span></a>
            <div class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                <a href="/services" class="text-blue-600 font-medium">Services</a>
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
            <a href="https://wa.me/2348032068718" target="_blank" class="bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition flex items-center gap-2">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Our Cleaning Services</h1>
        <p class="text-xl">Choose from our wide range of professional cleaning solutions</p>
    </div>
</section>

<!-- Services List -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-lg p-6 service-card border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-spray-can-sparkle text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">{{ $service->name }}</h3>
                <p class="text-gray-500 mb-4">{{ $service->description }}</p>
                <a href="/contact" class="text-blue-600 font-semibold hover:text-blue-700">Get Quote →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Need a Custom Cleaning Plan?</h2>
        <p class="mb-6">Contact us for personalized cleaning solutions tailored to your needs.</p>
        <a href="/contact" class="inline-block bg-white text-blue-900 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Contact Us</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-2xl font-bold mb-4">Oriefi's Clean</h3>
            <p class="text-gray-400">Professional cleaning services with industrial-grade equipment for spotless results.</p>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="/" class="hover:text-white">Home</a></li>
                <li><a href="/about" class="hover:text-white">About Us</a></li>
                <li><a href="/services" class="hover:text-white">Services</a></li>
                <li><a href="/contact" class="hover:text-white">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Contact Info</h4>
            <ul class="space-y-2 text-gray-400">
                <li><i class="fas fa-phone mr-2"></i> +234 803 206 8718</li>
                <li><i class="fab fa-whatsapp mr-2"></i> WhatsApp: +234 803 206 8718</li>
                <li><i class="fas fa-envelope mr-2"></i> info@orieflsclean.com</li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/2348032068718" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
        <p>&copy; 2026 Oriefi's Cleaning Services. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
