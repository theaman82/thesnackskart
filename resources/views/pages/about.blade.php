@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-600 to-green-500 py-20 px-4 text-white">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">About TheSnacksKart</h1>
        <p class="text-xl opacity-90">Bringing Pure Organic Product Directly from Farms to Your Home</p>
    </div>
</section>

<div class="max-w-6xl mx-auto px-4 py-16">
    <!-- Our Story Section -->
    <section class="mb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold mb-6 text-gray-900">Our Story</h2>
                <p class="text-gray-700 text-lg mb-4">
                    TheSnacksKart was founded in 2018 with a simple mission: to make organic, pesticide-free products accessible to every household in India. We believe that everyone deserves access to pure, nutritious food without compromising on quality or breaking the bank.
                </p>
                <p class="text-gray-700 text-lg mb-4">
                    What started as a small initiative to support local farmers has grown into a trusted e-commerce platform serving over 500,000 customers across India. We work directly with certified organic farms to ensure that every product is fresh, genuine, and chemical-free.
                </p>
                <p class="text-gray-700 text-lg">
                    Our commitment to transparency, quality, and customer satisfaction drives everything we do. Each product comes with complete farm details, certifications, and harvest information so you know exactly where your food comes from.
                </p>
            </div>
            <div class="flex justify-center">
                <div class="w-full h-96 bg-green-100 rounded-lg flex items-center justify-center text-8xl">
                    👨‍🌾
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16 py-12">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg">
            <h3 class="text-2xl font-bold mb-4 text-blue-900 flex items-center gap-2">
                🎯 Our Mission
            </h3>
            <p class="text-gray-700 text-lg">
                To revolutionize the way Indians access organic products by creating a transparent, trustworthy marketplace that directly connects farmers with conscious consumers, ensuring fair prices for farmers and quality products for customers.
            </p>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-lg">
            <h3 class="text-2xl font-bold mb-4 text-green-900 flex items-center gap-2">
                🌟 Our Vision
            </h3>
            <p class="text-gray-700 text-lg">
                To build a nation where organic farming is the norm, not the exception. We aim to support 10,000+ organic farmers across India and serve 50 million families with health-conscious, sustainable food choices.
            </p>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="mb-16">
        <h2 class="text-4xl font-bold mb-12 text-center text-gray-900">Why Choose TheSnacksKart?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">🔍</div>
                <h3 class="text-xl font-bold mb-3">Complete Transparency</h3>
                <p class="text-gray-700">Every product includes farmer details, farm location, certifications, and harvest date so you know exactly where your food comes from.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">🌱</div>
                <h3 class="text-xl font-bold mb-3">100% Certified Organic</h3>
                <p class="text-gray-700">All our products are certified by recognized authorities and are completely free from pesticides, GMOs, and synthetic fertilizers.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">⚡</div>
                <h3 class="text-xl font-bold mb-3">Farm to Table Speed</h3>
                <p class="text-gray-700">Products are picked fresh and delivered within 24-48 hours to ensure maximum nutritional value and freshness.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">💰</div>
                <h3 class="text-xl font-bold mb-3">Fair Pricing</h3>
                <p class="text-gray-700">We ensure 50% of the profit goes directly to farmers, supporting their livelihoods and encouraging organic farming.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">🚚</div>
                <h3 class="text-xl font-bold mb-3">Eco-Friendly Delivery</h3>
                <p class="text-gray-700">We use recyclable packaging and carbon-neutral delivery options to minimize our environmental footprint.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-5xl mb-4">❤️</div>
                <h3 class="text-xl font-bold mb-3">Customer Care</h3>
                <p class="text-gray-700">Award-winning customer support team available 24/7 to help with any queries or concerns.</p>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="mb-16">
        <h2 class="text-4xl font-bold mb-12 text-center text-gray-900">Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach([
                ['name' => 'Rajeev Kumar', 'role' => 'Founder & CEO', 'emoji' => '👨‍💼'],
                ['name' => 'Priya Singh', 'role' => 'Co-Founder & COO', 'emoji' => '👩‍💼'],
                ['name' => 'Arjun Menon', 'role' => 'Head of Farmer Relations', 'emoji' => '👨‍🌾'],
                ['name' => 'Isha Patel', 'role' => 'Head of Quality Assurance', 'emoji' => '👩‍🔬'],
            ] as $member)
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="text-7xl mb-4">{{$member['emoji']}}</div>
                <h3 class="text-lg font-bold mb-2">{{$member['name']}}</h3>
                <p class="text-green-600 font-semibold">{{$member['role']}}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Achievements -->
    <section class="bg-green-50 p-12 rounded-lg mb-16">
        <h2 class="text-4xl font-bold mb-12 text-center text-gray-900">Our Achievements</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-green-600 mb-2">500K+</div>
                <p class="text-gray-700 font-semibold">Happy Customers</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-green-600 mb-2">2,500+</div>
                <p class="text-gray-700 font-semibold">Farmers Supported</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-green-600 mb-2">50,000+</div>
                <p class="text-gray-700 font-semibold">Daily Orders</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-green-600 mb-2">99.2%</div>
                <p class="text-gray-700 font-semibold">Customer Satisfaction</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-green-600 to-green-500 py-12 px-8 rounded-lg text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Join Our Organic Revolution</h2>
        <p class="text-lg mb-8 opacity-90">Shop now and be part of a movement towards healthier living and sustainable farming.</p>
        <a href="/shop" class="inline-block px-8 py-3 bg-white text-green-600 font-bold rounded-lg hover:bg-gray-100 transition">
            Continue Shopping
        </a>
    </section>
</div>
@endsection
