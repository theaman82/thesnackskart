<div class="space-y-6">
    <!-- Product Image -->
    <div class="flex justify-center">
        @if($product->featured_image)
            <img src="{{ Storage::url($product->featured_image) }}" 
                 alt="{{ $product->title }}"
                 class="h-40 w-40 object-cover rounded-lg shadow-lg">
        @else
            <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ urlencode($product->title) }}" 
                 alt="{{ $product->title }}"
                 class="h-40 w-40 object-cover rounded-lg shadow-lg">
        @endif
    </div>

    <!-- Product Details -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <h4 class="text-sm font-medium text-gray-500">Product Name</h4>
            <p class="mt-1 text-sm text-gray-900">{{ $product->title }}</p>
        </div>
        
        <div>
            <h4 class="text-sm font-medium text-gray-500">Category</h4>
            <p class="mt-1">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    {{ $product->category->title ?? 'N/A' }}
                </span>
            </p>
        </div>
        
        <div>
            <h4 class="text-sm font-medium text-gray-500">Slug</h4>
            <p class="mt-1 text-sm text-gray-900">{{ $product->slug }}</p>
        </div>
        
        <div>
            <h4 class="text-sm font-medium text-gray-500">Status</h4>
            <p class="mt-1">
                @if($product->status)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Inactive
                    </span>
                @endif
            </p>
        </div>
        
        <div>
            <h4 class="text-sm font-medium text-gray-500">Created At</h4>
            <p class="mt-1 text-sm text-gray-900">{{ $product->created_at ? $product->created_at->format('d M Y, h:i A') : 'N/A' }}</p>
        </div>
        
        <div>
            <h4 class="text-sm font-medium text-gray-500">Last Updated</h4>
            <p class="mt-1 text-sm text-gray-900">{{ $product->updated_at ? $product->updated_at->diffForHumans() : 'N/A' }}</p>
        </div>
    </div>

    <!-- Description -->
    @if($product->description)
        <div>
            <h4 class="text-sm font-medium text-gray-500">Description</h4>
            <div class="mt-1 prose prose-sm max-w-none">
                {!! $product->description !!}
            </div>
        </div>
    @endif

    <!-- Variants Section -->
    <div>
        <h4 class="text-sm font-medium text-gray-500 mb-3">Product Variants</h4>
        
        @if($product->variants && $product->variants->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">SKU</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Flavor</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">MRP</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Sale Price</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($product->variants as $variant)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $variant->sku }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $variant->flavor ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">
                                    {{ $variant->weight }} {{ $variant->weight_unit }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-900">₹{{ number_format($variant->mrp, 2) }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">₹{{ number_format($variant->sale_price, 2) }}</td>
                                <td class="px-4 py-2 text-sm">
                                    @if($variant->stock <= 0)
                                        <span class="text-red-600 font-medium">Out of Stock</span>
                                    @elseif($variant->stock <= 10)
                                        <span class="text-yellow-600 font-medium">{{ $variant->stock }} left</span>
                                    @else
                                        <span class="text-green-600 font-medium">{{ $variant->stock }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    @if($variant->status)
                                        <span class="text-green-600">✓ Active</span>
                                    @else
                                        <span class="text-red-600">✗ Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-500">No variants available for this product.</p>
        @endif
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-3 gap-4 pt-4 border-t">
        <div class="text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $product->variants ? $product->variants->count() : 0 }}</p>
            <p class="text-sm text-gray-500">Total Variants</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $product->variants ? $product->variants->sum('stock') : 0 }}</p>
            <p class="text-sm text-gray-500">Total Stock</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-gray-900">
                @php
                    $minPrice = $product->variants ? $product->variants->min('sale_price') : 0;
                    $maxPrice = $product->variants ? $product->variants->max('sale_price') : 0;
                @endphp
                @if($minPrice == $maxPrice)
                    ₹{{ number_format($minPrice, 2) }}
                @else
                    ₹{{ number_format($minPrice, 2) }} - ₹{{ number_format($maxPrice, 2) }}
                @endif
            </p>
            <p class="text-sm text-gray-500">Price Range</p>
        </div>
    </div>
</div>