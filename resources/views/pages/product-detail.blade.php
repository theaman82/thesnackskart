@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Breadcrumb -->
        <div class="mb-8 text-sm text-gray-600">
            <a href="/" class="hover:text-green-600">Home</a> / 
            <a href="/shop" class="hover:text-green-600">Products</a> / 
            <span class="font-semibold text-gray-900">Product Details</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-8 rounded-lg shadow-lg mb-12">
            <!-- Product Image -->
            <div>
                <div class="h-96 bg-gradient-to-br from-green-100 to-green-50 rounded-lg flex items-center justify-center text-9xl mb-6">
                    🍚
                </div>
                <div class="grid grid-cols-4 gap-4">
                    @foreach(range(1, 4) as $i)
                    <div class="h-24 bg-gray-100 rounded-lg flex items-center justify-center cursor-pointer hover:border-2 hover:border-green-600 transition">
                        <span class="text-4xl">🍚</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Organic Basmati Rice (Premium Quality)</h1>
                
                <!-- Rating -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex text-yellow-400 text-xl">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <span class="text-lg text-gray-600">(250 reviews)</span>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <span class="text-4xl font-bold text-green-600">₹349</span>
                    <span class="text-xl text-gray-500 line-through ml-4">₹449</span>
                    <span class="ml-4 bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">22% Off</span>
                </div>

                <!-- Stock Status -->
                <div class="mb-6 p-4 bg-green-50 border-2 border-green-200 rounded-lg">
                    <p class="text-green-700 font-semibold">✓ In Stock - Free Delivery Available</p>
                </div>

                <!-- Product Info -->
                <div class="mb-6 space-y-3">
                    <div class="flex justify-between py-3 border-b">
                        <span class="text-gray-600 font-medium">Package Size:</span>
                        <span class="text-gray-900 font-semibold">1 kg</span>
                    </div>
                    <div class="flex justify-between py-3 border-b">
                        <span class="text-gray-600 font-medium">Quantity Available:</span>
                        <span class="text-gray-900 font-semibold">2,450 units</span>
                    </div>
                    <div class="flex justify-between py-3 border-b">
                        <span class="text-gray-600 font-medium">Expiry:</span>
                        <span class="text-gray-900 font-semibold">18 months</span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="text-gray-600 font-medium">Certification:</span>
                        <span class="text-gray-900 font-semibold">USDA Organic Certified</span>
                    </div>
                </div>

                <!-- Quantity Selector -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Quantity</label>
                    <div class="flex items-center gap-4">
                        <button class="border-2 border-gray-300 w-12 h-12 rounded-lg hover:border-green-600 transition">−</button>
                        <input type="number" value="1" class="w-16 text-center border-2 border-gray-300 py-2 rounded-lg focus:border-green-600">
                        <button class="border-2 border-gray-300 w-12 h-12 rounded-lg hover:border-green-600 transition">+</button>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <div class="flex gap-4 mb-8">
                    <button class="flex-1 bg-green-600 text-white py-4 rounded-lg font-bold text-lg hover:bg-green-700 transition">
                        🛒 Add to Cart
                    </button>
                    <button class="flex-1 border-2 border-green-600 text-green-600 py-4 rounded-lg font-bold text-lg hover:bg-green-50 transition">
                        ❤️ Wishlist
                    </button>
                </div>

                <!-- Features -->
                <div class="space-y-3 mb-8">
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">✓</span>
                        <div>
                            <p class="font-semibold text-gray-900">100% Organic</p>
                            <p class="text-gray-600 text-sm">No pesticides or harmful chemicals</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">✓</span>
                        <div>
                            <p class="font-semibold text-gray-900">Farm Fresh</p>
                            <p class="text-gray-600 text-sm">Directly sourced from certified farms</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">✓</span>
                        <div>
                            <p class="font-semibold text-gray-900">Fast Delivery</p>
                            <p class="text-gray-600 text-sm">Delivered within 24-48 hours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="bg-white rounded-lg shadow-lg mb-12">
            <div class="flex border-b">
                <button class="px-6 py-4 font-semibold text-green-600 border-b-2 border-green-600">Description</button>
                <button class="px-6 py-4 font-semibold text-gray-600 hover:text-gray-900">Reviews</button>
                <button class="px-6 py-4 font-semibold text-gray-600 hover:text-gray-900">Shipping Info</button>
            </div>
            <div class="p-8">
                <h3 class="text-2xl font-bold mb-4">About this Product</h3>
                <p class="text-gray-700 mb-4">
                    Our Premium Organic Basmati Rice is sourced directly from certified organic farms in India. Each grain is long, slender, and has a natural aroma that elevates any meal. This rice is pesticide-free and grown using sustainable farming practices.
                </p>
                <h4 class="text-lg font-bold mb-3 mt-6">Key Features:</h4>
                <ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
                    <li>100% Pure Basmati Rice - Long & Slender Grains</li>
                    <li>USDA Organic Certified</li>
                    <li>No Artificial Flavors or Colors</li>
                    <li>Perfect for Biryani, Pulao, and Daily Cooking</li>
                    <li>Rich in Fiber and Essential Nutrients</li>
                    <li>18-Month Shelf Life</li>
                </ul>
                <h4 class="text-lg font-bold mb-3 mt-6">How to Cook:</h4>
                <ol class="list-decimal list-inside space-y-2 text-gray-700">
                    <li>Rinse rice 2-3 times with water</li>
                    <li>Soak for 30 minutes (optional but recommended)</li>
                    <li>Use 1:2 ratio (1 cup rice : 2 cups water)</li>
                    <li>Cook on medium heat until water evaporates</li>
                    <li>Fluff with fork and serve</li>
                </ol>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8">You Might Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                $relatedProducts = [
                    ['name' => 'Organic Wheat Flour', 'price' => 189, 'emoji' => '🌾'],
                    ['name' => 'Premium Ghee', 'price' => 549, 'emoji' => '🧈'],
                    ['name' => 'Organic Dal Mix', 'price' => 239, 'emoji' => '🟡'],
                    ['name' => 'Raw Honey', 'price' => 299, 'emoji' => '🍯'],
                ]
                @endphp

                @foreach($relatedProducts as $product)
                <a href="/product/1" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden group-hover:shadow-xl transition">
                        <div class="h-40 bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center text-5xl">
                            {{$product['emoji']}}
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 mb-2">{{$product['name']}}</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-green-600">₹{{$product['price']}}</span>
                                <button class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 transition text-sm">Add</button>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
