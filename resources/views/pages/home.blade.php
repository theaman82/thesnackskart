@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-50 to-amber-50 py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-5xl font-bold text-gray-900 mb-4">100% Organic & Farm Fresh</h1>
                <p class="text-xl text-gray-600 mb-8">Direct from farmers to your doorstep. Pure, organic, and nutritious food for a healthy lifestyle.</p>
                <div class="flex gap-4">
                    <a href="/shop" class="px-8 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">Shop Now</a>
                    <a href="#featured" class="px-8 py-3 border-2 border-green-600 text-green-600 font-semibold rounded-lg hover:bg-green-50 transition">Explore</a>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full h-96 bg-green-100 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-48 h-48 text-green-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                        </svg>
                        <p class="text-green-600 font-semibold text-lg">Fresh & Organic</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach(['Vegetables' => 'bg-orange-100', 'Fruits' => 'bg-red-100', 'Grains' => 'bg-yellow-100', 'Dairy' => 'bg-blue-100'] as $category => $color)
            <a href="/shop" class="group">
                <div class="{{$color}} rounded-lg p-8 text-center mb-4 group-hover:shadow-lg transition">
                    <div class="text-5xl mb-4">
                        @if($category === 'Vegetables')
                            🥬
                        @elseif($category === 'Fruits')
                            🍎
                        @elseif($category === 'Grains')
                            🌾
                        @else
                            🥛
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition">{{$category}}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="featured" class="py-16 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach(['6' => 'Organic Basmati Rice', '7' => 'Fresh Spinach Bundle', '8' => 'Premium Honey (500g)', '9' => 'Certified Organic Turmeric'] as $id => $product)
            <a href="/product/{{$id}}" class="group">
                <div class="bg-white rounded-lg overflow-hidden shadow-md group-hover:shadow-xl transition">
                    <div class="h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center text-5xl">
                        @if(str_contains($product, 'Rice'))
                            🍚
                        @elseif(str_contains($product, 'Spinach'))
                            🥬
                        @elseif(str_contains($product, 'Honey'))
                            🍯
                        @else
                            🟡
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">{{$product}}</h3>
                        <p class="text-gray-600 text-sm mb-4">100% Organic & Fresh</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">₹299</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Add</button>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-16 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Why Choose TheSnacksKart?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-5xl mb-4">🌱</div>
                <h3 class="text-xl font-bold mb-3">100% Organic</h3>
                <p class="text-gray-600">All products are certified organic with no harmful pesticides or chemicals.</p>
            </div>
            <div class="text-center">
                <div class="text-5xl mb-4">🚚</div>
                <h3 class="text-xl font-bold mb-3">Fast Delivery</h3>
                <p class="text-gray-600">Get fresh products delivered to your doorstep within 24-48 hours.</p>
            </div>
            <div class="text-center">
                <div class="text-5xl mb-4">👨‍🌾</div>
                <h3 class="text-xl font-bold mb-3">Direct from Farms</h3>
                <p class="text-gray-600">Supporting local farmers and ensuring the freshest produce for you.</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="bg-green-600 py-12 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Subscribe to Our Newsletter</h2>
        <p class="text-green-100 mb-6">Get exclusive deals and fresh product updates delivered to your inbox.</p>
        <div class="flex gap-2">
            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg focus:outline-none">
            <button class="px-8 py-3 bg-amber-500 text-white font-semibold rounded-lg hover:bg-amber-600 transition">Subscribe</button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 py-12 px-4">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <div>
            <h3 class="text-white font-bold text-lg mb-4">TheSnacksKart</h3>
            <p class="text-sm">Your one-stop destination for 100% organic and farm-fresh products.</p>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="/shop" class="hover:text-white">Shop</a></li>
                <li><a href="/about" class="hover:text-white">About Us</a></li>
                <li><a href="/contact" class="hover:text-white">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4">Company</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-white">Terms & Conditions</a></li>
                <li><a href="#" class="hover:text-white">FAQ</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4">Contact</h4>
            <ul class="space-y-2 text-sm">
                <li>📧 support@thesnackskart.com</li>
                <li>📞 1800-123-4567</li>
                <li>📍 Pan India Delivery</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-gray-700 pt-8 text-center text-sm">
        <p>&copy; 2024 TheSnacksKart. All rights reserved.</p>
    </div>
</footer>
@endsection
