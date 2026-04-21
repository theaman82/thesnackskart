    <div class="fixed z-50 right-0 top-0 w-96 h-full bg-white shadow-xl p-4 overflow-y-auto">

        <h2 class="text-lg font-bold mb-4">
            Your Cart ({{ count($cart) }})
        </h2>

        @foreach($cart as $item)
            <div class="flex gap-3 mb-4 border-b pb-3">

                <!-- <img src="{{ $item['image'] }}" class="w-16 h-16 rounded"> -->

                <div class="flex-1">
                    <h3 class="font-semibold">{{ $item['product_name'] }}</h3>

                    <p class="text-sm text-gray-500">
                        {{ $item['flavor'] }} • {{ $item['weight'] }}
                    </p>
                    <p>₹{{ $item['price'] * $item['quantity'] }}</p>

                    <!-- Quantity -->
                    <div class="flex items-center gap-2 mt-2">
                        <button wire:click="decrease({{ $item['variant_id'] }})">−</button>
                        <span>{{ $item['quantity'] }}</span>
                        <button wire:click="increase({{ $item['variant_id'] }})">+</button>
                    </div>
                </div>

                <button wire:click="remove({{ $item['variant_id'] }})">❌</button>

            </div>
        @endforeach

        <!-- Total -->
        <div class="mt-4 border-t pt-4">
            <h3 class="font-bold text-lg">
                Total: ₹{{ $this->total }}
            </h3>

            <button wire:click="checkout" class="w-full mt-3 bg-indigo-600 text-white py-2 rounded-lg">
                Checkout
            </button>
        </div>
    </div>
