<!-- Navigation -->
<nav class="bg-white shadow-lg sticky py-4 top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            {{-- <a href="/" class="text-2xl font-bold text-blue-700">{{ $settings['site_name'] ?? "Oriefi's" }}
                <span class="text-blue-500"></span></a> --}}
            <x-application-logo />
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
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '2348032068718' }}" target="_blank"
                class="bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition flex items-center gap-2">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>
</nav>