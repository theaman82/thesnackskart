<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white" x-data="{ loading: false }">
    <div wire:loading
        class="fixed inset-0 z-50 top-64 flex items-center justify-center">
        <div class="p-8 flex flex-col items-center gap-4 ">
            <div class="relative w-16 h-16">
                <div class="absolute inset-0 border-4 border-amber-200 rounded-full animate-spin border-t-amber-500"></div>
            </div>
            <p class="text-gray-700 font-medium">Filtering products...</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar Filters -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 h-fit sticky top-24">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Filters</h3>
                        @if ($category || $size || $priceFrom || $priceTo || $sort !== 'latest' || $search)
                            <button wire:click="clearFilters"
                                class="text-sm text-amber-600 hover:text-amber-700 font-semibold transition">
                                Clear
                            </button>
                        @endif
                    </div>

                    <!-- Search -->
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <label class="text-sm font-semibold text-gray-800 mb-3 block">Search Products</label>
                        <div class="relative">
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search products..."
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                            <svg class="absolute right-3 top-3 w-5 h-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Filter with Expansion -->
                    <div class="mb-8 pb-8 border-b border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Category</h4>
                        <div class="space-y-3 max-h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-amber-300 scrollbar-track-gray-100">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" wire:model.live="category" value=""
                                    class="w-4 h-4 accent-amber-500 cursor-pointer">
                                <span class="ml-3 text-gray-700 group-hover:text-gray-900 transition text-sm">All
                                    Categories</span>
                            </label>
                            @foreach ($categories as $cat)
                                <label class="flex items-center cursor-pointer group">
                                    <input type="radio" wire:model.live="category" value="{{ $cat->id }}"
                                        class="w-4 h-4 accent-amber-500 cursor-pointer">
                                    <span class="ml-3 text-gray-700 group-hover:text-gray-900 transition text-sm">
                                        {{ $cat->title }}
                                    </span>
                                </label>
                            @endforeach
                        </div>

                        @if ($allCategories->count() > 5)
                            <button wire:click="toggleShowAllCategories"
                                class="mt-4 w-full px-3 py-2 text-sm font-medium text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-lg transition">
                                {{ $showAllCategories ? '← Show Less' : 'View More →' }}
                            </button>
                        @endif
                    </div>

                    <!-- Size/Weight Filter -->
                    @if ($sizes->count() > 0)
                        <div class="mb-8 pb-8 border-b border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-4">Size</h4>
                            <div class="space-y-3 max-h-40 overflow-y-auto scrollbar-thin scrollbar-thumb-amber-300 scrollbar-track-gray-100">
                                <label class="flex items-center cursor-pointer group">
                                    <input type="radio" wire:model.live="size" value=""
                                        class="w-4 h-4 accent-amber-500 cursor-pointer">
                                    <span class="ml-3 text-gray-700 group-hover:text-gray-900 transition text-sm">All
                                        Sizes</span>
                                </label>
                                @foreach ($sizes as $s)
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="radio" wire:model.live="size" value="{{ $s }}"
                                            class="w-4 h-4 accent-amber-500 cursor-pointer">
                                        <span
                                            class="ml-3 text-gray-700 group-hover:text-gray-900 transition text-sm">{{ $s }}g</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Price Range Filter -->
                    <div class="mb-8 pb-8 border-b border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Price Range</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-semibold text-gray-600 block mb-2">From (₹)</label>
                                <input type="number" wire:model.live.debounce.500ms="priceFrom"
                                    placeholder="0" min="0"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-600 block mb-2">To (₹)</label>
                                <input type="number" wire:model.live.debounce.500ms="priceTo"
                                    placeholder="∞" min="0"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Sort -->
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-4">Sort By</h4>
                        <select wire:model.live="sort"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-white text-sm">
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                            <option value="price-low-high">Price: Low to High</option>
                            <option value="price-high-low">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="md:col-span-3">
                <!-- Results Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <p class="text-gray-600 text-sm">
                        <span class="font-semibold text-gray-900">{{ $products->total() }}</span>
                        products found
                        @if ($search)
                            <span class="text-amber-600 font-medium">for "{{ $search }}"</span>
                        @endif
                    </p>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label class="text-gray-600 text-sm whitespace-nowrap">Show:</label>
                        <select wire:model.live="perPage"
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="48">48</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                @if ($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" wire:key="products">
                        @foreach ($products as $product)
                            <a href="{{ route('view-products', $product->slug) }}" class="group">
                                <div
                                    class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 h-full flex flex-col">
                                    <!-- Product Image -->
                                    <div
                                        class="relative overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 h-48 flex items-center justify-center">
                                        @php
                                            $productImage = $product->images->where('is_primary', true)->first();
                                            $imageUrl = $productImage
                                                ? $productImage->image_url
                                                : ($product->featured_image
                                                    ? asset('storage/' . $product->featured_image)
                                                    : 'https://ui-avatars.com/api/?background=F59E0B&color=fff&name=' . urlencode($product->title));
                                        @endphp
                                        <img src="{{ asset('product/1770092517374.png') }}" alt="{{ $product->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                            onerror="this.src='https://ui-avatars.com/api/?background=F59E0B&color=fff&name={{ urlencode($product->title) }}'">

                                        <!-- Wishlist Button -->
                                        <button
                                            class="absolute top-3 right-3 w-9 h-9 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 transition">
                                            <svg class="w-5 h-5 text-gray-400 hover:text-red-500 transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="p-4 flex-1 flex flex-col">
                                        <div class="mb-3">
                                            <h3
                                                class="font-semibold text-gray-800 text-sm line-clamp-2 group-hover:text-amber-700 transition">
                                                {{ $product->title }}
                                            </h3>
                                            <p class="text-xs text-gray-500 mt-1">
                                                {{ $product->category->title }}
                                            </p>
                                        </div>

                                        <!-- Ratings -->
                                        <div class="flex items-center gap-2 mb-3">
                                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                                            <span class="text-xs text-gray-500">(4.8k)</span>
                                        </div>

                                        <!-- Price & Discount -->
                                        <div class="mb-4 flex-1">
                                            @if ($product->variants->count() > 0)
                                                @php
                                                    $variant = $product->variants->first();
                                                    $discount = round(
                                                        (($variant->mrp - $variant->sale_price) / $variant->mrp) * 100,
                                                    );
                                                @endphp
                                                <div class="flex items-baseline gap-2">
                                                    <span
                                                        class="text-xl font-bold text-gray-900">₹{{ number_format($variant->sale_price, 0) }}</span>
                                                    <span
                                                        class="text-sm text-gray-400 line-through">₹{{ number_format($variant->mrp, 0) }}</span>
                                                </div>
                                                @if ($discount > 0)
                                                    <span
                                                        class="inline-block text-xs bg-green-100 text-green-700 px-2 py-1 rounded mt-2 font-semibold">{{ $discount }}%
                                                        off</span>
                                                @endif
                                            @endif
                                        </div>

                                        <!-- Add to Cart Button -->
                                        <button wire:click.prevent="addToCart({{ $product->id }})"
                                            class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 rounded-lg transition font-medium text-sm flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12" wire:key="pagination">
                        {{ $products->links('pagination::tailwind') }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="py-16 text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">No products found</h3>
                        <p class="text-gray-600 mb-6">Try adjusting your filters or search criteria</p>
                        <button wire:click="clearFilters"
                            class="inline-block px-6 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition font-medium">
                            Clear All Filters
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scrollbar Styling -->
    <style>
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #fcd34d;
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #f59e0b;
        }
    </style>
</div>