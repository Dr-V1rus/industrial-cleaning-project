<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Oriefi's Cleaning</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a5f 0%, #2c7da0 100%);
        }
    </style>
</head>

<body class="bg-white">

    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <a href="/" class="text-2xl font-bold text-blue-700">

                <x-application-logo /></a>

                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                    <a href="/allservices" class="text-gray-700 hover:text-blue-600 font-medium">Services</a>
                    <a href="/contact" class="text-blue-600 font-medium">Contact</a>
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

    <!-- Hero -->
    <section class="hero-gradient text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl">Get in touch for quotes, inquiries, or support</p>
        </div>
    </section>


    <!-- Contact Content -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold mb-6">Send us a Message</h2>
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Your name" required
                        class="w-full mb-4 px-5 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="email" name="email" placeholder="Email address" required
                        class="w-full mb-4 px-5 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="tel" name="phone" placeholder="Phone number (optional)"
                        class="w-full mb-4 px-5 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <textarea name="message" placeholder="Tell us about your cleaning needs" required
                        class="w-full mb-4 px-5 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="5"></textarea>
                    <button type="submit"
                        class="bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">Send
                        Message</button>
                </form>
                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
                @endif
            </div>
            <div>
                <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                    <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-phone text-blue-600 text-xl w-8"></i>
                            <span>+234 803 206 8718</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fab fa-whatsapp text-green-600 text-xl w-8"></i>
                            <span>+234 803 206 8718 (WhatsApp)</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-envelope text-blue-600 text-xl w-8"></i>
                            <span>oyigbonkechi@gmail.com</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-clock text-blue-600 text-xl w-8"></i>
                            <span>Mon - Sat: 8:00 AM - 6:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-8 text-center text-white">
                    <i class="fab fa-whatsapp text-5xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Quick Quote via WhatsApp</h3>
                    <p class="mb-6">Get pricing instantly. Our team replies within minutes.</p>
                    <a href="https://wa.me/2348032068718?text=Hello%20Oriefi's%20Cleaning%2C%20I%20need%20a%20quote"
                        target="_blank"
                        class="inline-block bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                        Chat on WhatsApp →
                    </a>
                </div>
            </div>
        </div>
        <!-- Booking Section -->
        <section class="py-20 bg-gray-50" id="booking">
            <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-10">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold mb-6">Request a Cleaning</h2>
                    <form method="POST" action="{{ route('book.store') }}">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="name" placeholder="Full name" required
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <input type="email" name="email" placeholder="Email" required
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <input type="tel" name="phone" placeholder="Phone number" required
                            class="w-full mb-4 px-4 py-3 border rounded-lg">
                        <textarea name="address" placeholder="Service address" required
                            class="w-full mb-4 px-4 py-3 border rounded-lg" rows="2"></textarea>
                        <select name="service_id" required class="w-full mb-4 px-4 py-3 border rounded-lg">
                            <option value="">Select a service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <input type="date" name="preferred_date" required
                                class="w-full px-4 py-3 border rounded-lg">
                            <input type="time" name="preferred_time" class="w-full px-4 py-3 border rounded-lg">
                        </div>
                        <textarea name="notes" placeholder="Special requests"
                            class="w-full mb-4 px-4 py-3 border rounded-lg" rows="3"></textarea>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">Submit
                            Booking</button>
                    </form>
                    @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
                </div>
            </div>
        </section>
    </section>

    <!-- Footer -->
    <x-footer />
</body>

</html>