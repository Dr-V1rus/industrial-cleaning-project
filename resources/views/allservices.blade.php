<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Oriefi's Cleaning</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .service-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>


<body class="bg-white">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <a href="/" class="text-2xl font-bold text-blue-700">Oriefi's <span
                        class="text-blue-500">Clean</span></a>

                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>

                    <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>

                    <a href="/allservices" class="text-blue-600 font-medium">Services</a>

                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                    @auth
                        <a href="/admin/dashboard" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button type="submit"
                                class="text-red-600">Logout</button></form>
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

    <section class="bg-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Our Cleaning Services</h1>
            <p class="text-xl">Choose from our wide range of professional cleaning solutions</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden service-card border border-gray-100">

                        <img src="{{ asset('services/' . str_replace(' ', '-', strtolower($service->name)) . '.jpg') }}"
                            alt="{{ $service->name }}" class="w-full h-56 object-cover"
                            onerror="this.src='{{ asset('services/default.jpg') }}'">

                        <div class="p-6">

                            <h3 class="text-xl font-bold mb-2">{{ $service->name }}</h3>
                            <p class="text-gray-500 mb-4">{{ $service->description }}</p>
                            <a href="/contact"
                                class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center gap-1">Get
                                Quote →</a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />
</body>

</html>