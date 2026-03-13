@extends('layouts.app')

@section('content')
<!-- Header -->
<section class="bg-gradient-to-r from-green-600 to-green-500 py-20 px-4 text-white">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl opacity-90">We'd love to hear from you. Get in touch with us today!</p>
    </div>
</section>

<div class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <!-- Contact Info Cards -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="text-4xl mb-4 text-center">📞</div>
            <h3 class="text-xl font-bold mb-3 text-center">Phone</h3>
            <p class="text-center text-gray-600 mb-2">Call us during business hours</p>
            <p class="text-center text-green-600 font-bold text-lg">1-800-123-4567</p>
            <p class="text-center text-gray-600 text-sm mt-2">Mon - Sat: 9 AM - 8 PM IST</p>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="text-4xl mb-4 text-center">📧</div>
            <h3 class="text-xl font-bold mb-3 text-center">Email</h3>
            <p class="text-center text-gray-600 mb-2">Drop us an email and we'll respond</p>
            <p class="text-center text-green-600 font-bold">support@thesnackskart.com</p>
            <p class="text-center text-gray-600 text-sm mt-2">Response within 24 hours</p>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="text-4xl mb-4 text-center">📍</div>
            <h3 class="text-xl font-bold mb-3 text-center">Address</h3>
            <p class="text-center text-gray-600">TheSnacksKart Headquarters</p>
            <p class="text-center text-gray-600">Mumbai, Maharashtra</p>
            <p class="text-center text-gray-600 text-sm mt-2">Pan India Delivery</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <!-- Contact Form -->
        <div class="md:col-span-2">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6">Send us a Message</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                            <input type="text" placeholder="John Doe" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                            <input type="email" placeholder="john@example.com" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                            <input type="tel" placeholder="9876543210" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Subject *</label>
                            <select class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
                                <option>Select a subject</option>
                                <option>General Inquiry</option>
                                <option>Order Issue</option>
                                <option>Product Question</option>
                                <option>Farmer Partnership</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Message *</label>
                        <textarea placeholder="Type your message here..." rows="6" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600"></textarea>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="subscribe" class="w-4 h-4 text-green-600 rounded">
                        <label for="subscribe" class="ml-3 text-gray-700">Subscribe to our newsletter for updates and offers</label>
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold text-lg hover:bg-green-700 transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- FAQ/Quick Links -->
        <div>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6">Quick Help</h2>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 text-green-600">❓ How do I place an order?</h4>
                        <p class="text-gray-600 text-sm">Check our detailed guide in the FAQ section or chat with our support team.</p>
                    </div>
                    <hr>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 text-green-600">📦 Track My Order</h4>
                        <p class="text-gray-600 text-sm">Use your order ID to track your shipment in real-time.</p>
                    </div>
                    <hr>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 text-green-600">🔄 Return Policy</h4>
                        <p class="text-gray-600 text-sm">30-day return policy on all products. No questions asked!</p>
                    </div>
                    <hr>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 text-green-600">🌾 Farmer Partnership</h4>
                        <p class="text-gray-600 text-sm">Interested in selling with us? email us for details.</p>
                    </div>
                </div>

                <a href="#" class="inline-block mt-6 px-6 py-2 border-2 border-green-600 text-green-600 font-bold rounded-lg hover:bg-green-50 transition">
                    View FAQ
                </a>
            </div>

            <!-- Social Media -->
            <div class="bg-green-50 p-8 rounded-lg mt-6">
                <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                <div class="flex gap-4">
                    <a href="#" class="text-3xl hover:scale-110 transition">📘</a>
                    <a href="#" class="text-3xl hover:scale-110 transition">🐦</a>
                    <a href="#" class="text-3xl hover:scale-110 transition">📷</a>
                    <a href="#" class="text-3xl hover:scale-110 transition">▶️</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="mt-16">
        <h2 class="text-3xl font-bold mb-8 text-center">Our Locations</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['Mumbai' => 'Maharashtra', 'Delhi' => 'Delhi NCR', 'Bangalore' => 'Karnataka'] as $city => $region)
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="h-40 bg-gray-200 rounded-lg mb-4 flex items-center justify-center text-4xl">
                    📍
                </div>
                <h3 class="text-lg font-bold mb-2">{{$city}}</h3>
                <p class="text-gray-600 mb-3">{{$region}}</p>
                <p class="text-gray-600 text-sm">TheSnacksKart Distribution Center</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Newsletter -->
    <section class="bg-green-600 text-white py-12 px-4 rounded-lg mt-16 text-center">
        <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
        <p class="mb-6 opacity-90">Get exclusive offers and organic product updates directly in your inbox</p>
        <div class="flex gap-2 max-w-md mx-auto">
            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg focus:outline-none">
            <button class="px-8 py-3 bg-amber-500 font-bold rounded-lg hover:bg-amber-600 transition">Subscribe</button>
        </div>
    </section>
</div>
@endsection
