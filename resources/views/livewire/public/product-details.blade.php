<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Product Details Section --}}
    <div class="flex flex-wrap -mx-4">
        {{-- Product Image Gallery --}}
        <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
            <div class="sticky top-8">
                {{-- Main Image --}}
                <div class="mb-4 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl overflow-hidden border border-amber-100">
                  <img src="{{ asset('storage/' . $mainImage) }}" 
                         alt="Roasted Fox Nuts - Makhana" 
                         class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
                </div>
                
                {{-- Thumbnail Gallery --}}
                <div class="flex gap-4 overflow-x-auto pb-2">
                   @foreach($images as $image)
<div 
    wire:click="changeImage('{{ $image->image_url }}')"
    class="w-20 h-20 cursor-pointer border-2
    {{ $mainImage == $image->image_url ? 'border-amber-500' : 'border-transparent' }}">
    
   <img src="{{ asset('storage/' . $image->image_url) }}" 
         class="w-full h-full object-cover">
</div>
@endforeach
                </div>
            </div>
        </div>

        {{-- Product Info --}}
        <div class="w-full md:w-1/2 px-4">
            {{-- Breadcrumb --}}
 <nav class="text-sm mb-4">
                <ol class="flex flex-wrap items-center gap-1 text-gray-500">
                    <li><a href="/" class="hover:text-amber-600">Home</a></li>
                    <li><span class="mx-1">/</span></li>
                    <li><a href="#" class="hover:text-amber-600">{{ $product->category->title ?? 'Products' }}</a></li>
                    <li><span class="mx-1">/</span></li>
                    <li class="text-gray-700">{{ $product->title }}</li>
                </ol>
            </nav>

            {{-- Product Title & Badges --}}
            <div class="mb-4">
                <div class="flex flex-wrap gap-2 mb-2">
                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">100% Natural</span>
                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">Gluten Free</span>
                    <span class="bg-purple-100 text-purple-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">Vegan</span>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $product->title }} ({{ $product->category->title }})</h1>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500">by <a href="#" class="text-amber-600 hover:underline">Nature's Harvest</a></span>
                    <div class="flex items-center gap-1">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                        <span class="text-sm text-gray-500 ml-1">(1,284 reviews)</span>
                    </div>
                </div>
            </div>

            {{-- Price --}}
            <div class="mb-6">
                <div class="flex items-baseline gap-3 flex-wrap">
                    @if($selectedVariant)
    <span class="text-3xl font-bold text-gray-900">
        ₹{{ $selectedVariant->sale_price }}
    </span>

    <span class="text-lg text-gray-400 line-through">
        ₹{{ $selectedVariant->mrp }}
    </span>

    <span class="bg-green-100 text-green-800 text-sm font-semibold px-2.5 py-0.5 rounded">
        Save {{ round(($selectedVariant->mrp - $selectedVariant->sale_price) / $selectedVariant->mrp * 100) }}%
    </span>
@else
    <span class="text-red-500">Variant not available</span>
@endif
                    <span class="bg-orange-100 text-orange-700 text-sm font-semibold px-2.5 py-0.5 rounded">Limited Time Offer</span>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <p class="text-sm text-gray-500">Inclusive of all taxes</p>
                    <span class="text-green-600 text-sm font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Free Shipping
                    </span>
                </div>
            </div>

            {{-- Pack Size Options --}}
            <div class="mb-6">
                <h3 class="font-semibold text-gray-800 mb-3">Pack Size</h3>
                <div class="flex flex-wrap gap-3">
@foreach($variants->unique('weight') as $variant)
@php
    $exists = $variants
        ->where('flavor', $selectedFlavor)
        ->where('weight', $variant->weight)
        ->count();
@endphp

<button 
    wire:click="selectWeight({{ $variant->weight }})"
    {{ !$exists ? 'disabled' : '' }}
    class="px-4 py-2 border rounded
    {{ !$exists ? 'opacity-50 cursor-not-allowed' : '' }}">
    
    {{ $variant->weight }}{{ $variant->weight_unit }}
</button>
@endforeach
                </div>
            </div>

            {{-- Flavor Options --}}
            <div class="mb-6">
                <h3 class="font-semibold text-gray-800 mb-3">Choose Flavor</h3>
                <div class="flex flex-wrap gap-3">
                  @foreach($variants->unique('flavor') as $variant)
<button 
    wire:click="selectFlavor('{{ $variant->flavor }}')"
    class="px-4 py-2 rounded-lg
    {{ $selectedFlavor == $variant->flavor ? 'bg-gray-800 text-white' : 'bg-gray-100' }}">
    
    {{ $variant->flavor }}
</button>
@endforeach
                </div>
            </div>

            {{-- Key Benefits --}}
            <div class="mb-6 p-4 bg-green-50 rounded-xl">
                <h3 class="font-semibold text-gray-800 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Why Choose Our Fox Nuts?
                </h3>
                <ul class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">✓ Low in Calories</li>
                    <li class="flex items-center gap-2">✓ High in Protein</li>
                    <li class="flex items-center gap-2">✓ Rich in Antioxidants</li>
                    <li class="flex items-center gap-2">✓ No Artificial Preservatives</li>
                    <li class="flex items-center gap-2">✓ Air Roasted (Not Fried)</li>
                    <li class="flex items-center gap-2">✓ 100% Natural Ingredients</li>
                </ul>
            </div>

            {{-- Quantity & Actions --}}
            <div class="flex flex-wrap gap-4 mb-8">
                <div class="flex items-center border border-gray-300 rounded-lg">
                    <button class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-l-lg" wire:click="decreaseQty">-</button>
                    <span class="w-12 text-center font-medium">{{ $quantity }}</span>
                    <button class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-r-lg" wire:click="increaseQty">+</button>
                </div>
                <button class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-semibold py-2.5 px-6 rounded-lg transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M18 13l1.5 6M9 21h6M12 18v3"></path>
                    </svg>
                    Add to Cart
                </button>
                <button class="p-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </button>
            </div>

            {{-- Delivery & Warranty Info --}}
            <div class="border-t pt-6 space-y-3">
                <div class="flex items-center gap-3 text-sm">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong>In Stock</strong> - Ships within 24 hours</span>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h12M8 18h8"></path>
                    </svg>
                    <span>Free delivery on orders above ₹499</span>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <span>7-Day Return Policy on unopened packs</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Nutritional Information & Description Tabs --}}
    <div class="mt-12 border-t">
        <div class="flex flex-wrap gap-6 border-b">
            <button class="py-3 text-amber-600 border-b-2 border-amber-600 font-medium">Product Details</button>
            <button class="py-3 text-gray-500 hover:text-gray-700">Nutritional Info</button>
            <button class="py-3 text-gray-500 hover:text-gray-700">How to Eat</button>
            <button class="py-3 text-gray-500 hover:text-gray-700">Customer Reviews</button>
        </div>
        
        <div class="py-6">
            <p class="text-gray-600 leading-relaxed">
               @if ($product->description)
                   <div class="prose max-w-none text-gray-600">
        {!! $product->description !!}
    </div>

                   
               @endif
            </p>
<div class="grid md:grid-cols-3 gap-4 mt-6">

    {{-- Total Variants --}}
    <div class="text-center p-4 bg-gray-50 rounded-lg">
        <div class="text-2xl font-bold text-amber-600">
            {{ $variants->count() }}
        </div>
        <div class="text-sm text-gray-600">Available Variants</div>
    </div>

    {{-- Total Stock --}}
    <div class="text-center p-4 bg-gray-50 rounded-lg">
        <div class="text-2xl font-bold text-amber-600">
            {{ $variants->sum('stock') }}
        </div>
        <div class="text-sm text-gray-600">Total Stock</div>
    </div>

    {{-- Price Range --}}
    <div class="text-center p-4 bg-gray-50 rounded-lg">
        <div class="text-2xl font-bold text-amber-600">
            ₹{{ $variants->min('sale_price') }} - ₹{{ $variants->max('sale_price') }}
        </div>
        <div class="text-sm text-gray-600">Price Range</div>
    </div>

</div>
        </div>
    </div>

    {{-- Recommended Products Section --}}
@if($relatedProducts->isNotEmpty())
    <div class="mt-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">You May Also Like</h2>
            <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium flex items-center gap-1">
                View All <span>→</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
@foreach($relatedProducts as $item)
                {{-- Recommended Product 1 --}}
            <div class="group bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative bg-gradient-to-br from-amber-50 to-orange-50 aspect-square overflow-hidden">
                    <img src="{{ asset('storage/'.($item->images->first()->image_url?? 'default.png')) }}" 
                         alt="Peri Peri Fox Nuts" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">Bestseller</div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-1">{{ $item->title }}</h3>
                    <div class="flex items-center gap-2 mb-2">
                        <div class="flex text-yellow-400 text-sm">★★★★★</div>
                        <span class="text-xs text-gray-500">(892)</span>
                    </div>
                     @if($variant)
            <div class="mt-2">
                <span class="text-lg font-bold">₹{{ $variant->sale_price }}</span>
                <span class="text-sm line-through text-gray-400">
                    ₹{{ $variant->mrp }}
                </span>
            </div>
        @endif
                    <button class="w-full mt-3 bg-gray-100 hover:bg-amber-600 hover:text-white text-gray-800 font-medium py-2 rounded-lg transition-colors">
                        Add to Cart
                    </button>
                </div>
            </div>
          @endforeach

         
        </div>
    </div>
@endif

    {{-- Why Choose Us Section --}}
    <div class="mt-12 p-6 bg-amber-50 rounded-2xl">
        <h3 class="text-xl font-bold text-center text-gray-800 mb-6">Why Thousands Love Our Fox Nuts</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-800">100% Natural</p>
                <p class="text-xs text-gray-500">No preservatives</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-800">Fresh Roasted</p>
                <p class="text-xs text-gray-500">Made to order</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-800">Hygienic Packing</p>
                <p class="text-xs text-gray-500">Food grade packaging</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h12M8 18h8"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-800">Free Shipping</p>
                <p class="text-xs text-gray-500">On orders ₹499+</p>
            </div>
        </div>
    </div>
</div>