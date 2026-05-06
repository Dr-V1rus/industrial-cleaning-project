<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? "Oriefi's Cleaning" }} - Professional Cleaning Services</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Hero Slider - Smooth Continuous Scroll */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .slides {
            display: flex;
            width: 500%;
            height: 100%;
            animation: smoothScroll 25s linear infinite;
        }

        .slide {
            width: 20%;
            height: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        @keyframes smoothScroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-80%);
            }
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            text-align: center;
            color: white;
            width: 100%;
            padding: 0 20px;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }
    </style>

</head>

<body class="bg-white">

    <x-loader :duration="500" />

    <!-- Navigation -->
    <x-nav />

    <!-- Hero Slider -->
    <div class="hero-slider">
        <div class="slides">
            <div class="slide" style="background-image: url('{{ asset('images/hero1.jpeg') }}');"></div>

            <div class="slide" style="background-image: url('{{ asset('images/hero2.jpeg') }}');"></div>

            <div class="slide" style="background-image: url('{{ asset('images/hero3.jpeg') }}');"></div>

            <div class="slide" style="background-image: url('{{ asset('images/hero4.jpeg') }}');"></div>

            <div class="slide" style="background-image: url('{{ asset('images/house_cleaning.jpeg') }}');"></div>
        </div>

        <div class="hero-content">
            <h1 class="text-5xl md:text-7xl font-bold mb-4">
                {{ $settings['hero_title'] ?? 'Professional Cleaning Services' }}
            </h1>
            <p class="text-xl md:text-2xl mb-8">
                {{ $settings['hero_subtitle'] ?? 'Industrial-grade equipment for spotless results' }}
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <span class="bg-white/20 backdrop-blur px-5 py-2 rounded-full">MUR-POWER Vacuum</span>
                <span class="bg-white/20 backdrop-blur px-5 py-2 rounded-full">150 Bar Pressure</span>
                <span class="bg-white/20 backdrop-blur px-5 py-2 rounded-full">Tineco Deodorizing</span>
                <span class="bg-white/20 backdrop-blur px-5 py-2 rounded-full">Inso 7IN1 Brush</span>
            </div>
            <div class="mt-8">
                <a href="#booking"
                    class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition inline-block">Book
                    Now</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 mt-28 gap-12">
        <div><img src="{{ asset('images/cleaning_image.jpeg') }}" alt="Team" class="rounded-2xl shadow-xl w-full"></div>
        <div>
            <h2 class="text-3xl flex justify-center font-bold mb-4">Who We Are</h2>
            <p class="text-gray-600 mb-4 leading-relaxed">Oriefi's Cleaning Services is a premier cleaning company
                specializing in industrial-grade cleaning solutions. We combine state-of-the-art equipment with
                eco-friendly products to deliver exceptional results.</p>
            <p class="text-gray-600 mb-4">Our team is trained in using MUR-POWER HARYDRY vacuums, Greenworks 150 Bar
                pressure washers, Tineco deodorizing systems, and Inso 7IN1 electric brushes.</p>
            <p class="text-gray-600">We serve residential, commercial, and industrial clients with professionalism and
                attention to detail.</p>
        </div>
    </div>

    <!-- Services Preview with Images -->
    <section class="py-20 bg-gray-50" id="services">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3">Our Premium Services</h2>
                <p class="text-gray-600 text-lg">Choose from our wide range of professional cleaning solutions</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="{{ asset('images/cleaning_in_progress2.jpeg') }}" alt="Cleaning"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-home text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Residential Deep Clean</h3>
                        <p class="text-gray-500">Complete home cleaning including all rooms</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="{{ asset('images/cleaning_in_progress.jpeg') }}" alt="Office Cleaning"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-building text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Office Commercial Clean</h3>
                        <p class="text-gray-500">Professional workspace sanitization</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="{{ asset('images/greenworks_machine.jpeg') }}" alt="Pressure Washing"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-water text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Pressure Washing</h3>
                        <p class="text-gray-500">150 Bar Greenworks power washing</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="/allservices"
                    class="inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition">View
                    All Services →</a>
            </div>
        </div>
    </section>

    <!-- Stats Section with Counter -->
    <section class="py-16 bg-blue-900 text-white" id="stats-section">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold"><span class="counter" data-target="100">0</span>+</div>
                <div class="text-sm opacity-80 mt-2">Happy Clients</div>
            </div>
            <div>
                <div class="text-4xl font-bold"><span class="counter" data-target="100">0</span>+</div>
                <div class="text-sm opacity-80 mt-2">Jobs Completed</div>
            </div>
            <div>
                <div class="text-4xl font-bold">24/7</div>
                <div class="text-sm opacity-80 mt-2">Support Available</div>
            </div>
            <div>
                <div class="text-4xl font-bold"><span class="counter" data-target="8">0</span>+</div>
                <div class="text-sm opacity-80 mt-2">Expert Staff</div>
            </div>
        </div>
    </section>

    <!-- Video Showcase -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3">See Us In Action</h2>
                <p class="text-gray-600 text-lg">Watch our team delivering spotless results</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <video class="w-full h-[450px] object-cover" controls
                        poster="{{ asset($settings['video_1_poster'] ?? 'images/video-poster1.jpg') }}">
                        <source src="{{ asset($settings['video_1_url'] ?? 'videos/cleaning_video1.mp4') }}"
                            type="video/mp4">
                    </video>
                    <p class="text-center mt-2 text-gray-600">Professional Deep Cleaning</p>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <video class="w-full h-[450px] object-cover" controls
                        poster="{{ asset($settings['video_2_poster'] ?? 'images/video-poster2.jpg') }}">
                        <source src="{{ asset($settings['video_2_url'] ?? 'videos/cleaning_video2.mp4') }}"
                            type="video/mp4">
                    </video>
                    <p class="text-center mt-2 text-gray-600">Commercial Pressure Washing</p>
                </div>
            </div>
        </div>
    </section>

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
                    <div class="grid md:grid-cols-2 text-gray-600 gap-4 mb-4">
                        <input type="date" name="preferred_date" required class="w-full px-4 py-3 border rounded-lg">
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
            <div>
                <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Send a Message</h2>
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <input type="text" name="name" placeholder="Your name" required
                            class="w-full mb-4 px-4 py-3 border rounded-lg">
                        <input type="email" name="email" placeholder="Email" required
                            class="w-full mb-4 px-4 py-3 border rounded-lg">
                        <textarea name="message" placeholder="Tell us about your cleaning needs" required
                            class="w-full mb-4 px-4 py-3 border rounded-lg" rows="4"></textarea>
                        <button type="submit"
                            class="w-full bg-green-600 text-white font-semibold py-3 rounded-lg hover:bg-green-700 transition">Send
                            Message</button>
                    </form>
                </div>
                <div
                    class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl shadow-xl p-8 text-center text-white">
                    <i class="fab fa-whatsapp text-5xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Quick Quote via WhatsApp</h3>
                    <p class="mb-6">Get pricing instantly. Our team replies within minutes.</p>
                    <a href="https://wa.me/2348032068718?text=Hello%20Oriefi's%20Cleaning%2C%20I%20need%20a%20quote"
                        target="_blank"
                        class="inline-block bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Chat
                        on WhatsApp →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3">Frequently Asked Questions</h2>
                <p class="text-gray-600 text-lg">Got questions? We've got answers</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>What areas do you serve?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        We serve residential and commercial clients across the city and surrounding suburbs. Contact us
                        to confirm if we cover your specific location.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>How much does your cleaning service cost?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Pricing depends on the size of your space, type of service, and specific requirements. Contact
                        us via WhatsApp or our contact form for a free, no-obligation quote.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>What equipment do you use?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        We use industrial-grade equipment including MUR-POWER HARYDRY vacuums, Greenworks 150 Bar
                        pressure washers, Tineco deodorizing systems, and Inso 7IN1 electric cleaning brushes.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>Are your cleaning products safe for pets and children?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Yes! We use eco-friendly, non-toxic cleaning solutions that are safe for your family, pets, and
                        the environment.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>How do I book a cleaning service?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        You can book directly through our booking form on this page, send us a message via the contact
                        form, or reach out on WhatsApp. We'll confirm your appointment within hours.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div onclick="toggleFAQ(this)"
                        class="faq-question w-full text-left px-6 py-4 bg-white font-semibold text-gray-800 hover:bg-gray-50 cursor-pointer flex justify-between items-center">
                        <span>Do I need to be home during the cleaning?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </div>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Not necessarily. Many clients provide access instructions. We're fully insured and
                        background-checked for your peace of mind.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleFAQ(element) {
            // Get the answer div (next sibling after the clicked div)
            const answer = element.nextElementSibling;
            // Get the icon inside the clicked div
            const icon = element.querySelector('i');

            // Toggle the hidden class on the answer
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                answer.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>

    <style>
        .faq-question i {
            transition: transform 0.3s ease;
        }
    </style>

    <!-- Footer -->
    <x-footer />

    <script>
        // Counter animation - resets and counts every time section is viewed
        function startCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                // Reset to 0 before starting
                counter.innerText = '0';

                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 50;

                const updateCount = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        setTimeout(updateCount, 30);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        }

        // Trigger counters every time section comes into view (no unobserve)
        const observerOptions = {
            threshold: 0.5,
            rootMargin: "0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                }
            });
        }, observerOptions);

        const statsSection = document.getElementById('stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>

</body>

</html>