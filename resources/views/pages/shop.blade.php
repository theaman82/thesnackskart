@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b py-6 px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-900">Our Products</h1>
            <p class="text-gray-600 mt-2">Browse our collection of 100% organic and farm-fresh products</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <div class="md:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-6 text-gray-900">Filters</h3>
                    
                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-3">Category</h4>
                        <div class="space-y-2">
                            @foreach(['Vegetables', 'Fruits', 'Grains', 'Dairy', 'Spices', 'Honey'] as $cat)
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700">{{$cat}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-3">Price Range</h4>
                        <div class="space-y-2">
                            @foreach(['Under ₹500', '₹500 - ₹1000', '₹1000 - ₹2000', '₹2000+'] as $price)
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700">{{$price}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Rating Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-3">Rating</h4>
                        <div class="space-y-2">
                            @foreach([5, 4, 3, 2, 1] as $rating)
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700">
                                    @for($i = 0; $i < $rating; $i++)⭐@endfor (${{$rating}} & up)
                                </span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Clear Filters</button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="md:col-span-3">
                <!-- Sort -->
                <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center gap-4">
                        <label class="text-gray-700 font-medium">Sort by:</label>
                        <select class="border-2 border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-green-600">
                            <option>Relevance</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Best Sellers</option>
                        </select>
                    </div>
                    <span class="text-gray-600">Showing 12 products</span>
                </div>

                <!-- Products -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                    $products = [
                        ['id' => 1, 'name' => 'Organic Basmati Rice', 'price' => 349, 'rating' => 4.5, 'emoji' => '🍚'],
                        ['id' => 2, 'name' => 'Fresh Tomatoes (1kg)', 'price' => 45, 'rating' => 4.8, 'emoji' => '🍅'],
                        ['id' => 3, 'name' => 'Organic Spinach Bundle', 'price' => 59, 'rating' => 4.7, 'emoji' => '🥬'],
                        ['id' => 4, 'name' => 'Premium Turmeric Powder', 'price' => 199, 'rating' => 4.9, 'emoji' => '🟡'],
                        ['id' => 5, 'name' => 'Fresh Strawberries (500g)', 'price' => 189, 'rating' => 4.6, 'emoji' => '🍓'],
                        ['id' => 6, 'name' => 'Raw Honey (500ml)', 'price' => 299, 'rating' => 5.0, 'emoji' => '🍯'],
                        ['id' => 7, 'name' => 'Organic Milk (1 Liter)', 'price' => 89, 'rating' => 4.4, 'emoji' => '🥛'],
                        ['id' => 8, 'name' => 'Fresh Apples (1kg)', 'price' => 129, 'rating' => 4.5, 'emoji' => '🍎'],
                        ['id' => 9, 'name' => 'Chana Dal (1kg)', 'price' => 159, 'rating' => 4.7, 'emoji' => '🟡'],
                        ['id' => 10, 'name' => 'Fresh Carrots (1kg)', 'price' => 49, 'rating' => 4.6, 'emoji' => '🥕'],
                        ['id' => 11, 'name' => 'Organic Jaggery', 'price' => 179, 'rating' => 4.8, 'emoji' => '🟤'],
                        ['id' => 12, 'name' => 'Fresh Bananas (1kg)', 'price' => 59, 'rating' => 4.5, 'emoji' => '🍌'],
                    ]
                    @endphp

                    @foreach($products as $product)
                    <a href="/product/{{$product['id']}}" class="group">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group-hover:shadow-xl transition">
                            <div class="h-48 bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center text-6xl">
                                {{$product['emoji']}}
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-green-600 transition">{{$product['name']}}</h3>
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="flex text-yellow-400">
                                        @for($i = 0; $i < floor($product['rating']); $i++)⭐@endfor
                                    </div>
                                    <span class="text-sm text-gray-600">({{$product['rating']}})</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-green-600">₹{{$product['price']}}</span>
                                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm">Add</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center gap-4">
                    <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-green-600 transition">← Previous</button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-green-600 transition">2</button>
                    <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-green-600 transition">3</button>
                    <button class="px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-green-600 transition">Next →</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
