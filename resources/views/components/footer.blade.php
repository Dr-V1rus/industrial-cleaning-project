<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
        <div>
            <div class="w-58 mb-4">
                <x-application-logo />
            </div>
            <p class="text-gray-400">Professional cleaning services with industrial-grade equipment for spotless results.</p>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Home</a></li>
                <li><a href="{{ url('/about') }}" class="hover:text-white transition">About Us</a></li>
                <li><a href="{{ url('/allservices') }}" class="hover:text-white transition">Services</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-white transition">Contact</a></li>
                @auth
                    <li><a href="{{ url('/admin/dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                @endauth
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Contact Info</h4>
            <ul class="space-y-2 text-gray-400">
                <li><i class="fas fa-phone mr-2"></i> {{ $settings['contact_phone'] ?? '+234 803 206 8718' }}</li>
                <li><i class="fab fa-whatsapp mr-2"></i> WhatsApp: {{ $settings['contact_phone'] ?? '+234 803 206 8718' }}</li>
                <li><i class="fas fa-envelope mr-2"></i> {{ $settings['contact_email'] ?? 'info@orieflsclean.com' }}</li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="{{ $settings['facebook_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $settings['youtube_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition"><i class="fab fa-youtube"></i></a>
                <a href="{{ $settings['instagram_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition"><i class="fab fa-instagram"></i></a>
                <a href="{{ $settings['tiktok_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-600 transition"><i class="fab fa-tiktok"></i></a>
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '2348032068718' }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Oriefi\'s Cleaning Services' }}. All rights reserved.</p>
    </div>
</footer>
