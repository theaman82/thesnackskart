<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    @if(count($cart))

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Items -->
        <div class="md:col-span-2 space-y-4">
            @foreach($cart as $id => $item)
                <div class="bg-white p-4 rounded-lg shadow flex justify-between">

                    <div>
                        <h3 class="font-semibold">{{ $item['product_name'] }}</h3>

                        <p class="text-sm text-gray-500">
                            {{ $item['flavor'] }} • {{ $item['weight'] }}
                        </p>

                        <p class="mt-1 font-semibold">
                            ₹{{ $item['price'] * $item['quantity'] }}
                        </p>

                        <div class="flex gap-3 mt-2">
                            <button wire:click="decrease({{ $id }})">−</button>
                            <span>{{ $item['quantity'] }}</span>
                            <button wire:click="increase({{ $id }})">+</button>
                        </div>
                    </div>

                    <button wire:click="remove({{ $id }})"
                        class="text-red-500">Remove</button>
                </div>
            @endforeach
        </div>

        <!-- Summary -->
        <div class="bg-white p-4 rounded-lg shadow h-fit">

            <h2 class="font-bold text-lg mb-4">Price Details</h2>

            <div class="flex justify-between mb-2">
                <span>Subtotal</span>
                <span>₹{{ $this->subtotal }}</span>
            </div>

            <div class="flex justify-between mb-2 text-green-600">
                <span>Discount</span>
                <span>- ₹{{ $this->discount }}</span>
            </div>

            <div class="border-t pt-3 flex justify-between font-bold">
                <span>Total</span>
                <span>₹{{ $this->total }}</span>
            </div>

            @auth
                <button class="w-full mt-4 bg-indigo-600 text-white py-2 rounded-lg">
                    Proceed to Checkout
                </button>
            @else
                <a href="{{ route('login') }}"
                   class="block text-center w-full mt-4 bg-indigo-600 text-white py-2 rounded-lg">
                    Login to Checkout
                </a>
            @endauth

        </div>

    </div>

    @else
        <div class="text-center py-20">
            <h2>Your cart is empty 🛒</h2>
        </div>
    @endif

</div>