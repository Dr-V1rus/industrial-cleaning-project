<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Oriefi's Cleaning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="text-2xl font-bold text-blue-700">Oriefi's <span
                        class="text-blue-500">Clean</span></a>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="/about" class="text-blue-600 font-medium">About</a>
                    <a href="/services" class="text-gray-700 hover:text-blue-600 font-medium">Services</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                    @auth<a href="/admin/dashboard" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button type="submit"
                                class="text-red-600">Logout</button></form>
                    @else<a href="{{ route('login') }}"
                    class="text-gray-700 hover:text-blue-600 font-medium">Login</a>@endauth
                </div>
                <a href="https://wa.me/2348032068718" target="_blank"
                    class="bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition flex items-center gap-2"><i
                        class="fab fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </nav>

    <section class="relative h-96 bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1600');">
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white">About Oriefi's Cleaning</h1>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <div>
                <img src="https://images.unsplash.com/photo-1563453392212-326f5e854473?w=600" alt="Team"
                    class="rounded-2xl shadow-xl w-full">
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Who We Are</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">Oriefi's Cleaning Services is a premier cleaning company
                    specializing in industrial-grade cleaning solutions. We combine state-of-the-art equipment with
                    eco-friendly products to deliver exceptional results.</p>
                <p class="text-gray-600 mb-4">Our team is trained in using MUR-POWER HARYDRY vacuums, Greenworks 150 Bar
                    pressure washers, Tineco deodorizing systems, and Inso 7IN1 electric brushes.</p>
                <p class="text-gray-600">We serve residential, commercial, and industrial clients with professionalism
                    and attention to detail.</p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8">
            <div class="text-center"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Mission</h3>
                <p class="text-gray-500 mt-2">To provide spotless, hygienic environments using cutting-edge technology.
                </p>
            </div>
            <div class="text-center"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Vision</h3>
                <p class="text-gray-500 mt-2">To become the most trusted cleaning service provider in Nigeria.</p>
            </div>
            <div class="text-center"><img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=400"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Values</h3>
                <p class="text-gray-500 mt-2">Quality, reliability, and customer satisfaction guaranteed.</p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">Oriefi's Clean</h3>
                <p class="text-gray-400">Professional cleaning services with industrial-grade equipment for spotless
                    results.</p>
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
                <div class="flex space-x-4"><a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600"><i
                            class="fab fa-facebook-f"></i></a><a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400"><i
                            class="fab fa-twitter"></i></a><a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600"><i
                            class="fab fa-instagram"></i></a><a href="https://wa.me/2348032068718"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600"><i
                            class="fab fa-whatsapp"></i></a></div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
            <p>&copy; 2026 Oriefi's Cleaning Services. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>