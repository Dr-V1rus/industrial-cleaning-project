@props(['title', 'description', 'keywords'])

<title>{{ $title ?? 'Oriefi\'s Cleaning Services - Professional Cleaning in Nigeria' }}</title>
<meta name="description" content="{{ $description ?? 'Professional cleaning services with industrial-grade equipment. Residential, commercial, and industrial cleaning. Free quotes via WhatsApp.' }}">
<meta name="keywords" content="{{ $keywords ?? 'cleaning services, professional cleaning, residential cleaning, commercial cleaning, pressure washing, carpet cleaning, Nigeria cleaning' }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph for social sharing -->
<meta property="og:title" content="{{ $title ?? 'Oriefi\'s Cleaning Services' }}">
<meta property="og:description" content="{{ $description ?? 'Professional cleaning services in Nigeria. Book online or WhatsApp for instant quote.' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">