

<!-- Mobile Side Drawer Menu (Slides from left, not full screen) -->
<div id="mobileMenu" class="fixed top-0 left-0 h-full w-64 bg-white shadow-xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div class="flex justify-end p-4 border-b">
        <button id="closeMenuBtn" class="text-gray-700">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
    <div class="flex flex-col space-y-4 p-6">
        <a href="/" class="text-gray-700 hover:text-blue-600 font-medium py-2">Home</a>
        <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium py-2">About</a>
        <a href="/allservices" class="text-gray-700 hover:text-blue-600 font-medium py-2">Services</a>
        <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium py-2">Contact</a>
        @auth
            <a href="/admin/dashboard" class="text-gray-700 hover:text-blue-600 font-medium py-2">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-700 font-medium py-2 w-full text-left">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">Login</a>
        @endauth
        <hr class="my-2">
        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '2348032068718' }}" target="_blank"
            class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition flex items-center justify-center gap-2 w-full">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
    </div>
</div>

<!-- Overlay when drawer is open -->
<div id="menuOverlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

<!-- Desktop Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <x-application-logo class="h-20 w-40" />

            <!-- Desktop Menu -->
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

            <!-- Desktop WhatsApp Button -->
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '2348032068718' }}" target="_blank"
                class="hidden md:flex bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition items-center gap-2">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
</nav>

<script>
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeMenuBtn = document.getElementById('closeMenuBtn');
    const menuOverlay = document.getElementById('menuOverlay');

    function openMobileMenu() {
        mobileMenu.classList.remove('-translate-x-full');
        menuOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileMenu.classList.add('-translate-x-full');
        menuOverlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openMobileMenu);
    if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMobileMenu);
    if (menuOverlay) menuOverlay.addEventListener('click', closeMobileMenu);
</script>