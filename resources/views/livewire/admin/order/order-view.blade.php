<div class="order-details-container">
    <!-- Header Section -->
    <div class="mb-6 pb-4 border-b border-gray-200">
        <div class="flex justify-between items-start">
            <div>
                <div class="flex items-center space-x-3">
                    <h2 class="text-xl font-bold text-gray-900">Order #{{ $order->id }}</h2>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                        @if($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">Placed on {{ $order->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Order Items -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Products Section -->
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <div class="px-4 py-3 bg-gray-100 border-b border-gray-200">
                    <h3 class="font-semibold text-gray-800">Order Items</h3>
                    <p class="text-xs text-gray-500">{{ $order->items->count() }} item(s)</p>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @foreach($order->items as $item)
                    <div class="p-4 hover:bg-white transition-colors">
                        <div class="flex gap-4">
                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                @if($item->product && $item->product->featured_image)
                                    <img src="{{ Storage::url($item->product->featured_image) }}" 
                                         alt="{{ $item->product->title }}"
                                         class="w-16 h-16 object-cover rounded border border-gray-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded border border-gray-200 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Product Details -->
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">
                                            {{ $item->product->title ?? 'Product Not Available' }}
                                        </h4>
                                        @if($item->variant)
                                            <div class="mt-1 text-xs text-gray-600 space-y-1">
                                                @if($item->variant->flavor)
                                                    <p><span class="font-medium">Flavor:</span> {{ $item->variant->flavor }}</p>
                                                @endif
                                                @if($item->variant->weight)
                                                    <p><span class="font-medium">Weight:</span> {{ $item->variant->weight }} {{ $item->variant->weight_unit }}</p>
                                                @endif
                                                @if($item->variant->pack_type)
                                                    <p><span class="font-medium">Pack Type:</span> {{ ucfirst($item->variant->pack_type) }}</p>
                                                @endif
                                                <p><span class="font-medium">SKU:</span> {{ $item->variant->sku }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-gray-900">₹{{ number_format($item->price, 2) }}</p>
                                        <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                                        <p class="text-sm font-semibold text-gray-900 mt-1">
                                            ₹{{ number_format($item->price * $item->quantity, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Order Total Summary -->
                <div class="px-4 py-3 bg-gray-100 border-t border-gray-200">
                    <div class="flex justify-end">
                        <div class="w-64 space-y-1">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-medium">₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}</span>
                            </div>
                            @if(($order->shipping_charge ?? 0) > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Shipping:</span>
                                <span class="font-medium">₹{{ number_format($order->shipping_charge, 2) }}</span>
                            </div>
                            @endif
                            @if(($order->discount ?? 0) > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Discount:</span>
                                <span class="font-medium text-green-600">-₹{{ number_format($order->discount, 2) }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between text-base font-bold border-t border-gray-300 pt-2 mt-1">
                                <span>Total:</span>
                                <span class="text-blue-600">₹{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Order Information -->
        <div class="space-y-6">
            <!-- Customer Information -->
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <div class="px-4 py-3 bg-gray-100 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h3 class="font-semibold text-gray-800">Customer Information</h3>
                    </div>
                </div>
                <div class="p-4 space-y-2">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-medium text-gray-900">{{ $order->user->name ?? 'Guest User' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium text-gray-900">{{ $order->user->email ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Mobile</p>
                        <p class="font-medium text-gray-900">{{ $order->user->mobile ?? $order->user->phone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <div class="px-4 py-3 bg-gray-100 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h3 class="font-semibold text-gray-800">Shipping Address</h3>
                    </div>
                </div>
                <div class="p-4">
                    @if($order->address)
                        <div class="space-y-1 text-sm">
                            <p class="text-gray-900">{{ $order->address->street }}</p>
                            <p class="text-gray-900">{{ $order->address->city }}, {{ $order->address->state }}</p>
                            <p class="text-gray-900">PIN Code: {{ $order->address->pincode }}</p>
                            @if($order->address->landmark)
                                <p class="text-gray-600 text-xs">Landmark: {{ $order->address->landmark }}</p>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No address found</p>
                    @endif
                </div>
            </div>

            <!-- Payment Information -->
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <div class="px-4 py-3 bg-gray-100 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <h3 class="font-semibold text-gray-800">Payment Information</h3>
                    </div>
                </div>
                <div class="p-4 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Payment Method:</span>
                        <span class="font-medium text-gray-900">{{ ucfirst($order->payment_method ?? 'N/A') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Payment Status:</span>
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full 
                            @if($order->payment_status === 'paid') bg-green-100 text-green-800
                            @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($order->payment_status ?? 'pending') }}
                        </span>
                    </div>
                    @if($order->transaction_id)
                    <div class="text-sm">
                        <span class="text-gray-600">Transaction ID:</span>
                        <p class="font-mono text-xs text-gray-900 mt-1 break-all">{{ $order->transaction_id }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .order-details-container {
        max-height: 80vh;
        overflow-y: auto;
        padding-right: 4px;
    }
    
    .order-details-container::-webkit-scrollbar {
        width: 6px;
    }
    
    .order-details-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .order-details-container::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .order-details-container::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>