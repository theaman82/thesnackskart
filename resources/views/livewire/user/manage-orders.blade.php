<div class="max-w-6xl mx-auto p-4 md:p-6 bg-gray-100 min-h-screen">

    <!-- Search Bar -->
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <input type="text" placeholder="Search your orders here"
            class="flex-1 px-5 py-4 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button
            class="px-6 py-4 bg-blue-600 text-white rounded-lg font-medium shadow hover:bg-blue-700 transition flex items-center justify-center gap-2 min-w-[180px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Search Orders
        </button>
    </div>

    <div class="space-y-4">
        @forelse($orders as $order)
            @php
                $firstItem = $order->items->first();
                $itemCount = $order->items->count();
            @endphp

            <div class="bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-sm hover:shadow-md transition">
                <div class="flex flex-col lg:flex-row lg:items-center gap-5">

                    <!-- Product Info -->
                    <div class="flex items-start gap-4 flex-1 min-w-0">

                        <!-- Image -->
                        <div
                            class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                            <img src="{{ $firstItem->product_image ?? 'https://via.placeholder.com/100' }}"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- Details -->
                        <div class="min-w-0 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                {{ $firstItem->product_name }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $firstItem->variant_details }}
                            </p>

                            @if($itemCount > 1)
                                <div
                                    class="mt-3 inline-block px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-700 border">
                                    + {{ $itemCount - 1 }} More Items
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="lg:w-32 text-left lg:text-center">
                        <p class="text-xl font-semibold text-gray-900">
                            ₹{{ $order->total_amount }}
                        </p>
                    </div>

                    <!-- Status -->
                    <div class="lg:w-64">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-3 h-3 rounded-full 
                            {{ $order->status === 'delivered' ? 'bg-green-500' : 'bg-yellow-500' }}">
                            </span>

                            <p class="font-semibold text-gray-900 capitalize">
                                {{ $order->status }}
                            </p>
                        </div>

                        <p class="text-sm text-gray-600">
                            {{ $order->placed_at ? \Carbon\Carbon::parse($order->placed_at)->format('M d') : '' }}
                        </p>
                    </div>

                </div>
            </div>

        @empty
            <div class="bg-white border border-gray-200 rounded-xl p-4 text-center">
                No Orders Found
            </div>
        @endforelse
    </div>
</div>