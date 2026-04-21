<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Oriefi's Cleaning Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .btn-primary { transition: all 0.2s ease; }
        .btn-primary:hover { transform: translateY(-1px); }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-2xl font-bold text-blue-600">Oriefi's Clean</a>
                <div class="flex gap-6">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
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
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 text-white text-center py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; 2026 Oriefi's Cleaning Services. Professional cleaning with industrial-grade equipment.</p>
            <p class="text-gray-400 text-sm mt-2">WhatsApp: +234 803 206 8718</p>
        </div>
    </footer>
</body>
</html>
