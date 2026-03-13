@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b py-6 px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @php
                    $cartItems = [
                        ['id' => 1, 'name' => 'Organic Basmati Rice (1kg)', 'price' => 349, 'quantity' => 2, 'emoji' => '🍚'],
                        ['id' => 2, 'name' => 'Fresh Spinach Bundle', 'price' => 59, 'quantity' => 1, 'emoji' => '🥬'],
                        ['id' => 3, 'name' => 'Premium Honey (500ml)', 'price' => 299, 'quantity' => 1, 'emoji' => '🍯'],
                    ]
                    @endphp

                    @forelse($cartItems as $item)
                    <div class="border-b last:border-b-0 p-6 flex items-center gap-6 hover:bg-gray-50 transition">
                        <!-- Product Image -->
                        <div class="text-5xl flex-shrink-0">
                            {{$item['emoji']}}
                        </div>

                        <!-- Product Details -->
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">{{$item['name']}}</h3>
                            <p class="text-gray-600 text-sm mb-2">SKU: ORG-{{str_pad($item['id'], 4, '0', STR_PAD_LEFT)}}</p>
                            <p class="text-green-600 font-semibold">₹{{$item['price']}}/unit</p>
                        </div>

                        <!-- Quantity Controls -->
                        <div class="flex items-center gap-3 bg-gray-100 p-2 rounded-lg">
                            <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition">−</button>
                            <input type="number" value="{{$item['quantity']}}" class="w-12 text-center border-0 bg-transparent font-semibold" readonly>
                            <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition">+</button>
                        </div>

                        <!-- Subtotal -->
                        <div class="text-right min-w-24">
                            <p class="text-gray-600 text-sm">Subtotal</p>
                            <p class="text-2xl font-bold text-green-600">₹{{$item['price'] * $item['quantity']}}</p>
                        </div>

                        <!-- Remove Button -->
                        <button class="text-red-600 hover:text-red-700 text-2xl transition">
                            🗑️
                        </button>
                    </div>
                    @empty
                    <div class="p-12 text-center">
                        <p class="text-gray-600 text-lg">Your cart is empty</p>
                    </div>
                    @endforelse

                    <!-- Empty State Alternative (uncomment to show) -->
                    <!-- <div class="p-12 text-center">
                        <div class="text-6xl mb-4">🛒</div>
                        <h3 class="text-2xl font-bold mb-2">Your cart is empty</h3>
                        <p class="text-gray-600 mb-6">Start shopping to add items to your cart</p>
                        <a href="/shop" class="inline-block px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">Continue Shopping</a>
                    </div> -->
                </div>

                <!-- Continue Shopping -->
                <div class="mt-6">
                    <a href="/shop" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold">
                        ← Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900">Order Summary</h2>

                    <!-- Summary Items -->
                    <div class="space-y-4 mb-6 pb-6 border-b">
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal (3 items)</span>
                            <span class="font-semibold">₹1,364</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Shipping</span>
                            <span class="font-semibold text-green-600">FREE</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Discount (10% Off)</span>
                            <span class="font-semibold text-green-600">-₹136</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Tax (5%)</span>
                            <span class="font-semibold">₹62</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between items-center mb-6 pb-6 border-b">
                        <span class="text-xl font-bold text-gray-900">Total</span>
                        <span class="text-3xl font-bold text-green-600">₹1,290</span>
                    </div>

                    <!-- Promo Code -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Promo Code</label>
                        <div class="flex gap-2">
                            <input type="text" placeholder="Enter code" class="flex-1 px-3 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
                            <button class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">Apply</button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button class="w-full bg-green-600 text-white py-3 rounded-lg font-bold text-lg hover:bg-green-700 transition mb-3">
                        Proceed to Checkout
                    </button>

                    <!-- Continue Shopping Button -->
                    <button class="w-full border-2 border-gray-300 py-3 rounded-lg font-semibold text-gray-700 hover:border-green-600 hover:text-green-600 transition">
                        Continue Shopping
                    </button>

                    <!-- Offers Section -->
                    <div class="mt-6 p-4 bg-green-50 rounded-lg border-2 border-green-200">
                        <h4 class="font-bold text-green-900 mb-3">💝 Special Offers</h4>
                        <ul class="space-y-2 text-sm text-green-800">
                            <li>✓ Free shipping on orders above ₹499</li>
                            <li>✓ 10% off with code: ORGANIC10</li>
                            <li>✓ New customers: 20% off with code: NEW20</li>
                        </ul>
                    </div>

                    <!-- Trust Badges -->
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <div class="grid grid-cols-3 gap-2 text-center text-sm">
                            <div>
                                <div class="text-2xl mb-1">🔒</div>
                                <p class="text-gray-700 font-semibold">Secure</p>
                            </div>
                            <div>
                                <div class="text-2xl mb-1">🚚</div>
                                <p class="text-gray-700 font-semibold">Fast</p>
                            </div>
                            <div>
                                <div class="text-2xl mb-1">💯</div>
                                <p class="text-gray-700 font-semibold">Verified</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- You Might Like Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8">You Might Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                $suggestions = [
                    ['name' => 'Organic Wheat Flour', 'price' => 189, 'emoji' => '🌾'],
                    ['name' => 'Fresh Milk (1L)', 'price' => 89, 'emoji' => '🥛'],
                    ['name' => 'Premium Ghee', 'price' => 549, 'emoji' => '🧈'],
                    ['name' => 'Organic Tea (500g)', 'price' => 279, 'emoji' => '🍵'],
                ]
                @endphp

                @foreach($suggestions as $product)
                <a href="/product/1" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden group-hover:shadow-lg transition">
                        <div class="h-40 bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center text-5xl">
                            {{$product['emoji']}}
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 mb-2 line-clamp-2">{{$product['name']}}</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-green-600">₹{{$product['price']}}</span>
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
