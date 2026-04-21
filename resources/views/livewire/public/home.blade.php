<div>
    <section class="relative overflow-hidden bg-gradient-to-br from-[#f7fbf6] via-[#fdfdf8] to-[#fff8ee]">
        <!-- Background decorative layers -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-24 left-0 h-72 w-72 rounded-full bg-green-200/30 blur-3xl"></div>
            <div class="absolute top-1/3 right-0 h-80 w-80 rounded-full bg-amber-200/30 blur-3xl"></div>
            <div
                class="absolute inset-0 opacity-[0.05] bg-[linear-gradient(to_right,#16a34a_1px,transparent_1px),linear-gradient(to_bottom,#16a34a_1px,transparent_1px)] bg-[size:60px_60px]">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-5 md:px-8 lg:px-4 pt-16 pb-20 md:pt-20 md:pb-24">
            <div class="grid lg:grid-cols-2 gap-14 xl:gap-20 items-center">

                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <!-- Top label -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-green-200 bg-white/80 backdrop-blur-sm shadow-sm mb-6">
                        <span class="h-2.5 w-2.5 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-sm font-semibold tracking-wide text-green-700 uppercase">
                            100% Certified Organic
                        </span>
                    </div>

                    <!-- Heading -->
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight text-gray-900 leading-[1.05]">
                        Fresh from the
                        <span class="block text-green-700">Farm to Your Home</span>
                    </h1>

                    <!-- Subheading -->
                    <p class="mt-6 max-w-2xl mx-auto lg:mx-0 text-lg md:text-xl leading-relaxed text-gray-600">
                        Discover naturally grown fruits, vegetables, and essentials sourced directly from trusted local
                        farmers — fresh, chemical-free, and delivered with care.
                    </p>

                    <!-- CTA -->
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="/shop"
                            class="group inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-green-600 text-white font-semibold shadow-lg shadow-green-200 transition-all duration-300 hover:bg-green-700 hover:-translate-y-0.5">
                            Shop Fresh Now
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>

                        <a href="#featured"
                            class="inline-flex items-center justify-center px-7 py-4 rounded-xl border border-gray-300 bg-white/80 text-gray-800 font-semibold hover:border-green-600 hover:text-green-700 hover:bg-green-50 transition-all duration-300">
                            Explore Products
                        </a>
                    </div>

                    <!-- Mini stats / trust -->
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-2xl mx-auto lg:mx-0">
                        <div
                            class="rounded-2xl bg-white/80 backdrop-blur-sm border border-green-100 shadow-sm px-5 py-4">
                            <p class="text-2xl font-bold text-gray-900">500+</p>
                            <p class="text-sm text-gray-600 mt-1">Organic products</p>
                        </div>
                        <div
                            class="rounded-2xl bg-white/80 backdrop-blur-sm border border-green-100 shadow-sm px-5 py-4">
                            <p class="text-2xl font-bold text-gray-900">50+</p>
                            <p class="text-sm text-gray-600 mt-1">Local farm partners</p>
                        </div>
                        <div
                            class="rounded-2xl bg-white/80 backdrop-blur-sm border border-green-100 shadow-sm px-5 py-4">
                            <p class="text-2xl font-bold text-gray-900">Same Day</p>
                            <p class="text-sm text-gray-600 mt-1">Fresh delivery</p>
                        </div>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="relative">
                    <!-- Main image card -->
                    <div
                        class="relative rounded-[28px] overflow-hidden shadow-[0_25px_80px_-20px_rgba(22,163,74,0.25)] border border-white/60 bg-white">
                        <img src="{{ asset('/banner/anya_blog_banner-1.jpg') }}"
                            alt="Fresh organic vegetables and fruits"
                            class="w-full h-[420px] sm:h-[500px] lg:h-[580px] object-cover">

                        <!-- Dark soft gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/5 to-transparent"></div>

                        <!-- Bottom info card -->
                        <div class="absolute bottom-5 left-5 right-5">
                            <div
                                class="flex items-center justify-between gap-4 rounded-2xl bg-white/85 backdrop-blur-md border border-white/70 shadow-xl px-5 py-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Today’s Fresh Pick</p>
                                    <p class="text-lg md:text-xl font-bold text-gray-900">Seasonal Organic Harvest</p>
                                </div>
                                <div
                                    class="hidden sm:flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-700">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 21c4.97-4.97 8-8.582 8-12a8 8 0 10-16 0c0 3.418 3.03 7.03 8 12z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating top card -->
                    <div
                        class="hidden md:flex absolute -top-6 -left-10 bg-white rounded-2xl shadow-xl border border-green-100 px-5 py-4 items-center gap-3">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-6h13v6M9 17H5a2 2 0 01-2-2V7a2 2 0 012-2h4m0 12V5m0 0l-3 3m3-3l3 3">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Direct from</p>
                            <p class="font-semibold text-gray-900">Trusted Farmers</p>
                        </div>
                    </div>

                    <!-- Floating bottom-right badge -->
                    <div
                        class="hidden md:block absolute -bottom-6 -right-6 rounded-2xl bg-green-600 text-white shadow-xl px-6 py-4">
                        <p class="text-sm uppercase tracking-wide text-green-100">Freshness</p>
                        <p class="text-2xl font-bold">100%</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="w-full mx-auto  px-4 sm:px-6 lg:px-12">
            <h2 class="text-2xl md:text-4xl font-bold text-center text-gray-800 mb-10 md:mb-14">
                Shop by Category
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-4 md:gap-6">

                <!-- 1. Roasted Makhana -->
                <a href="/shop?category=roasted-makhana"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 ">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center">
                        <img src="/banner/product-1.png" alt="Roasted Makhana"
                            class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Roasted Makhana
                        </h3>
                    </div>
                </a>

                <!-- 2. Fresh Vegetables -->
                <a href="/shop?category=fresh-vegetables"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-2.png" alt="Fresh Vegetables"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Fresh Vegetables
                        </h3>
                    </div>
                </a>

                <!-- 3. Seasonal Fruits -->
                <a href="/shop?category=seasonal-fruits"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-3.png" alt="Seasonal Fruits"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Seasonal Fruits
                        </h3>
                    </div>
                </a>

                <!-- 4. Nuts & Dry Fruits -->
                <a href="/shop?category=nuts-dry-fruits"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-4.png" alt="Nuts & Dry Fruits"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Nuts & Dry Fruits
                        </h3>
                    </div>
                </a>

                <!-- 5. Grains & Millets -->
                <a href="/shop?category=grains-millets"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-5.png" alt="Grains & Millets"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Grains & Millets
                        </h3>
                    </div>
                </a>

                <!-- 6. Pulses & Lentils -->
                <a href="/shop?category=pulses-lentils"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-6.png" alt="Pulses & Lentils"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Pulses & Lentils
                        </h3>
                    </div>
                </a>

                <!-- 7. Spices & Herbs -->
                <a href="/shop?category=spices-herbs"
                    class="group block bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-amber-300 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                    <div class="aspect-square bg-amber-50/40 flex items-center justify-center ">
                        <img src="/banner/product-2.png" alt="Spices & Herbs"
                            class="w-full h-full  object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3
                            class="text-base md:text-lg font-medium text-gray-800 group-hover:text-amber-700 transition-colors">
                            Spices & Herbs
                        </h3>
                    </div>
                </a>

            </div>

            <div class="text-center mt-10 md:mt-14">
                <a href="/shop"
                    class="inline-block px-8 py-3 bg-amber-600 text-white font-medium rounded-lg hover:bg-amber-700 transition">
                    View All Products →
                </a>
            </div>
        </div>
    </section>
    <!-- Featured Products Section -->
    <section id="featured" class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <!-- Simple Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Featured Products
                </h2>
                <p class="text-gray-600">Shop our best selling makhana varieties</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Card 1 - Roasted Makhana (Amber Theme) -->
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="/banner/1736159404-Cream-Onion.jpg" alt="Roasted Makhana"
                            class="w-full  object-cover group-hover:scale-105 transition duration-300">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 transition">
                            <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">Roasted Makhana</h3>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                            <span class="text-xs text-gray-500 ml-2">(4.8k)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-gray-900">₹299</span>
                                <span class="text-sm text-gray-400 line-through ml-2">₹400</span>
                            </div>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">25% off</span>
                        </div>
                        <button wire:click="addToCart(1)"
                            class="w-full cursor-pointer mt-4 bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition flex items-center justify-center gap-2">

                            🛒 Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Card 2 - Spicy Makhana (Red Theme) -->
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="/banner/1771831586-pp makhana 1.jpg.jpeg" alt="Roasted Makhana"
                            class="w-full  object-cover group-hover:scale-105 transition duration-300">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 transition">
                            <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">Roasted Makhana</h3>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                            <span class="text-xs text-gray-500 ml-2">(4.8k)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-gray-900">₹299</span>
                                <span class="text-sm text-gray-400 line-through ml-2">₹400</span>
                            </div>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">25% off</span>
                        </div>
                        <button wire:click="addToCart(2)"
                            class="w-full cursor-pointer mt-4 bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Card 3 - Organic Makhana (Green Theme) -->
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="/banner/1771831673-Makoni Front.jpg" alt="Roasted Makhana"
                            class="w-full  object-cover group-hover:scale-105 transition duration-300">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 transition">
                            <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">Roasted Makhana</h3>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                            <span class="text-xs text-gray-500 ml-2">(4.8k)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-gray-900">₹299</span>
                                <span class="text-sm text-gray-400 line-through ml-2">₹400</span>
                            </div>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">25% off</span>
                        </div>
                        <button
                            class="w-full cursor-pointer mt-4 bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Card 4 - Salted Makhana (Blue Theme) -->
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="/banner/1771421815-Honey.png" alt="Roasted Makhana"
                            class="w-full  object-cover group-hover:scale-105 transition duration-300">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 transition">
                            <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">Roasted Makhana</h3>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                            <span class="text-xs text-gray-500 ml-2">(4.8k)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-gray-900">₹299</span>
                                <span class="text-sm text-gray-400 line-through ml-2">₹400</span>
                            </div>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">25% off</span>
                        </div>
                        <button
                            class="w-full mt-4 cursor-pointer bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                </div>

            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="/shop"
                    class="inline-block px-8 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition shadow-md">
                    View All Products →
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 px-4 bg-gradient-to-b from-amber-50/80 to-white">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1.5 bg-amber-100 text-amber-700 font-medium rounded-full text-sm mb-4">
                    Why Thousands Trust Us
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-stone-800 mb-4">
                    The Snacks Kart Promise
                </h2>
                <p class="text-lg text-stone-600 max-w-2xl mx-auto">
                    We don't just sell snacks — we deliver purity, trust, and goodness in every bite
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">

                <!-- Feature 1: Organic -->
                <div
                    class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Decorative Background -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-100 rounded-bl-full -z-0 opacity-50"></div>

                    <div class="relative z-10">
                        <!-- Custom SVG Icon -->
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-green-100 to-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-green-600" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C9 2 6 4 6 8C6 12 12 18 12 18C12 18 18 12 18 8C18 4 15 2 12 2Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" fill="currentColor" fill-opacity="0.2" />
                                <path d="M12 22V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 22H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <circle cx="12" cy="8" r="2" stroke="currentColor" stroke-width="1.5" fill="white" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-stone-800 mb-3">Certified Organic Goodness</h3>

                        <p class="text-stone-600 leading-relaxed">
                            Every makhana is cultivated in pristine farms without pesticides or chemicals.
                            <span class="block mt-2 text-green-600 font-semibold">USDA & India Organic Certified</span>
                        </p>

                        <!-- Stats -->
                        <div class="mt-6 flex items-center gap-4 text-sm border-t border-stone-100 pt-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-stone-600">0% Chemicals</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-stone-600">100% Natural</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 2: Fast Delivery -->
                <div
                    class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Decorative Background -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-bl-full -z-0 opacity-50"></div>

                    <div class="relative z-10">
                        <!-- Custom SVG Icon -->
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-100 to-sky-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-blue-600" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4H4V16H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M20 10H12V18H20V10Z" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" fill="currentColor"
                                    fill-opacity="0.2" />
                                <circle cx="7" cy="19" r="2" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="17" cy="19" r="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M7 17V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M17 17V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M4 10H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-stone-800 mb-3">Lightning Fast Delivery</h3>

                        <p class="text-stone-600 leading-relaxed">
                            From our warehouse to your kitchen in record time. We ensure your snacks reach you at peak
                            freshness.
                            <span class="block mt-2 text-blue-600 font-semibold">Free delivery on orders ₹499+</span>
                        </p>

                        <!-- Delivery Stats -->
                        <div class="mt-6 flex items-center gap-4 text-sm border-t border-stone-100 pt-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-stone-600">24-48 Hours</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2 2 2 4-4 2 2 2-2 2 2 2-2 2 2"></path>
                                </svg>
                                <span class="text-stone-600">Track Order</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 3: Direct from Farms -->
                <div
                    class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Decorative Background -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-100 rounded-bl-full -z-0 opacity-50"></div>

                    <div class="relative z-10">
                        <!-- Custom SVG Icon -->
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-amber-100 to-orange-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-amber-600" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 10L12 3L21 10L18 13L12 8L6 13L3 10Z" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    fill="currentColor" fill-opacity="0.2" />
                                <path d="M8 13V20H16V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 20V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <circle cx="12" cy="12" r="1" fill="currentColor" />
                                <path d="M6 10L4 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M18 10L20 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-stone-800 mb-3">Direct From Family Farms</h3>

                        <p class="text-stone-600 leading-relaxed">
                            Partnering with 500+ local farmers across Bihar. Fair trade practices that support farming
                            communities.
                            <span class="block mt-2 text-amber-600 font-semibold">Empowering 2000+ farmers</span>
                        </p>

                        <!-- Impact Stats -->
                        <div class="mt-6 flex items-center gap-4 text-sm border-t border-stone-100 pt-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <span class="text-stone-600">500+ Farmers</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4.03 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4.03-3-9s1.34-9 3-9">
                                    </path>
                                </svg>
                                <span class="text-stone-600">Bihar Origin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="mt-16 bg-amber-50/50 rounded-3xl p-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                        <span class="font-semibold text-stone-700">FSSAI Approved</span>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                            </path>
                        </svg>
                        <span class="font-semibold text-stone-700">Eco-Friendly Packaging</span>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>
                        <span class="font-semibold text-stone-700">24/7 Customer Support</span>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                        <span class="font-semibold text-stone-700">Secure Payments</span>
                    </div>
                </div>
            </div>

            <!-- CTA Banner -->
            <div class="mt-16 bg-gradient-to-r from-amber-500 to-orange-500 rounded-3xl p-10 text-center text-white">
                <h3 class="text-3xl font-bold mb-3">Join 50,000+ Happy Customers</h3>
                <p class="text-lg mb-6 opacity-90">Experience the purest, tastiest makhana delivered with love</p>
                <button
                    class="bg-white text-amber-600 px-8 py-3 rounded-xl font-semibold hover:bg-stone-50 transition shadow-lg hover:shadow-xl inline-flex items-center gap-2">
                    Shop Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>


<livewire:cart-sidebar/>
    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300 pt-16 pb-8 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12 mb-12">

                <!-- Brand Column - Larger -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white">TheSnacksKart</span>
                    </div>

                    <p class="text-stone-400 mb-6 leading-relaxed max-w-md">
                        Bringing the purest taste of Bihar's finest makhana to your doorstep.
                        100% organic, directly sourced from local farmers.
                    </p>

                    <!-- Social Links -->
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center hover:bg-amber-500 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center hover:bg-amber-500 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center hover:bg-amber-500 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center hover:bg-amber-500 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="/shop"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Shop All Products
                            </a>
                        </li>
                        <li>
                            <a href="/about"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Our Story
                            </a>
                        </li>
                        <li>
                            <a href="/contact"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="/blog"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Blog & Recipes
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-white font-semibold text-lg mb-6">Support</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="#"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Shipping Policy
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Returns & Refunds
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-stone-400 hover:text-amber-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-semibold text-lg mb-6">Get in Touch</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-stone-400">hello@thesnackskart.com</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-stone-400">+91 1800 123 4567</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-stone-400">Patna, Bihar - 800001</span>
                        </li>
                    </ul>

                    <!-- Newsletter Signup -->
                    <div class="mt-6">
                        <p class="text-white text-sm mb-3">Subscribe for offers & updates</p>
                        <div class="flex">
                            <input type="email" placeholder="Your email"
                                class="flex-1 px-4 py-2 bg-stone-800 border border-stone-700 rounded-l-lg focus:outline-none focus:border-amber-500 text-stone-300 text-sm">
                            <button
                                class="px-4 py-2 bg-amber-500 text-white rounded-r-lg hover:bg-amber-600 transition flex items-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods & Trust Badges -->
            <div class="border-t border-stone-800 pt-8 mb-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-stone-400">We Accept:</span>
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg"
                            alt="Visa" class="h-6 w-6 opacity-50 hover:opacity-100 transition">
                        <span class="text-white font-bold text-xs bg-stone-800 px-2 py-1 rounded">VISA</span>
                        <span class="text-white font-bold text-xs bg-stone-800 px-2 py-1 rounded">MC</span>
                        <span class="text-white font-bold text-xs bg-stone-800 px-2 py-1 rounded">UPI</span>
                        <span class="text-white font-bold text-xs bg-stone-800 px-2 py-1 rounded">Paytm</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-sm text-stone-400">Trusted by:</span>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <span class="text-stone-400 text-sm ml-1">4.8 (10k+ reviews)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright & Additional Links -->
            <div class="border-t border-stone-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-stone-500">
                        © 2024 TheSnacksKart. All rights reserved. | Made with ❤️ in Bihar
                    </p>

                    <div class="flex gap-6 text-sm">
                        <a href="#" class="text-stone-500 hover:text-amber-500 transition">Sitemap</a>
                        <a href="#" class="text-stone-500 hover:text-amber-500 transition">Privacy</a>
                        <a href="#" class="text-stone-500 hover:text-amber-500 transition">Terms</a>
                        <a href="#" class="text-stone-500 hover:text-amber-500 transition">Accessibility</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>