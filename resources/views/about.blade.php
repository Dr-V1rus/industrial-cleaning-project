<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Oriefi's Cleaning</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white">

    <x-nav />

    <section class="relative h-[600px] bg-cover bg-center"
        style="background-image: url('{{ asset('images/cleaning_ongoing1.jpeg') }}');">
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
            <h1 class="text-7xl text-center font-bold text-white">About Oriefi's <br> Cleaning Services</h1>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <div>
                <img src="{{ asset('images/cleaning_ongoing.jpeg') }}" alt="Team"
                    class="rounded-2xl shadow-xl w-full h-[390px]">
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
            <div class="text-center">
                <img src="{{ asset('images/cleaning_in_progress2.jpeg') }}"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Mission</h3>
                <p class="text-gray-500 mt-2">To provide spotless, hygienic environments using cutting-edge technology.
                </p>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/cleaning_ongoin3.jpeg') }}"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Vision</h3>
                <p class="text-gray-500 mt-2">To become the most trusted cleaning service provider in Nigeria.</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/cleaning_equipments1.jpeg') }}"
                    class="rounded-2xl shadow-lg w-full mb-4 h-64 object-cover">
                <h3 class="text-xl font-bold">Our Values</h3>
                <p class="text-gray-500 mt-2">Quality, reliability, and customer satisfaction guaranteed.</p>
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>