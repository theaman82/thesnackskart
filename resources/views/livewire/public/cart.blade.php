<div class="min-h-screen bg-gradient-to-br from-amber-50 to-orange-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        @if(count($cart) > 0)
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 flex flex-col gap-6">
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <!-- Address Section -->
                        @auth
                            <div class="bg-white rounded-2xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                    Delivery Address
                                </h2>

                                @if(count($addresses) > 0)
                                    <div class="space-y-3 mb-4">
                                        @foreach($addresses as $address)
                                            <label @class([
                                                'flex items-start gap-3 p-4 border-2 rounded-lg cursor-pointer hover:border-amber-500 transition-colors',
                                                'border-amber-500 bg-amber-50' => $selectedAddressId == $address['id'],
                                                'border-gray-200' => $selectedAddressId != $address['id']
                                            ])>
                                                <input type="radio" wire:model="selectedAddressId" value="{{ $address['id'] }}"
                                                    class="mt-1">
                                                <div class="flex-1">
                                                    <p class="font-semibold text-gray-900">{{ $address['name'] }}</p>
                                                    <p class="text-sm text-gray-600 mt-1">
                                                        {{ $address['address_line'] }}, {{ $address['area'] ?? 'N/A' }}
                                                    </p>
                                                    <p class="text-sm text-gray-600">
                                                        {{ $address['city'] }}, {{ $address['state'] }} - {{ $address['pincode'] }}
                                                    </p>
                                                    <p class="text-sm text-gray-600 mt-1">📱 {{ $address['phone'] }}</p>
                                                    @if($address['is_default'])
                                                        <span
                                                            class="inline-block mt-2 text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Default</span>
                                                    @endif
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>

                                    <button wire:click="openAddressModal"
                                        class="w-full py-3 border-2 border-amber-500 text-amber-500 rounded-lg hover:bg-amber-50 font-semibold transition-colors">
                                        + Add New Address
                                    </button>
                                @else
                                    <div class="text-center py-8 bg-gray-50 rounded-lg">
                                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p class="text-gray-600 mb-4">No address saved yet</p>
                                        <button wire:click="openAddressModal"
                                            class="w-full py-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-semibold transition-colors">
                                            Add Delivery Address
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="bg-white rounded-2xl shadow-sm p-6 text-center">
                                <p class="text-gray-600 mb-4">Please login to add delivery address</p>
                                <a href="{{ route('login') }}"
                                    class="w-full py-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-semibold transition-colors block">
                                    Login / Register
                                </a>
                            </div>
                        @endauth
                    </div>
                    <!-- Cart Items -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        @foreach($cart as $id => $item)
                            <div class="p-6 border-b last:border-b-0 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-4">
                                    <!-- Product Image -->
                                    <div class="w-24 h-24 flex-shrink-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['product_name'] }}"
                                            class="w-full h-full object-cover rounded-lg bg-gray-100">
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900 text-lg">{{ $item['product_name'] }}</h3>

                                        <div class="flex gap-2 mt-1 text-sm text-gray-600">
                                            <span class="text-amber-600 font-medium">{{ $item['flavor'] }}</span>
                                            <span>•</span>
                                            <span>{{ $item['weight'] }}</span>
                                        </div>

                                        <!-- Pricing -->
                                        <div class="flex items-center gap-3 mt-3">
                                            <span
                                                class="text-xl font-bold text-gray-900">₹{{ number_format($item['price']) }}</span>
                                            @if($item['mrp'] > $item['price'])
                                                <span
                                                    class="text-sm text-gray-400 line-through">₹{{ number_format($item['mrp']) }}</span>
                                                <span
                                                    class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full font-medium">
                                                    Save ₹{{ number_format($item['mrp'] - $item['price']) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Quantity & Actions -->
                                    <div class="flex flex-col justify-between items-end">
                                        <!-- Quantity Selector -->
                                        <div class="flex items-center gap-3 bg-gray-100 rounded-lg p-2">
                                            <button wire:click="decrease({{ $id }})"
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded transition-colors">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 12H4" />
                                                </svg>
                                            </button>
                                            <span
                                                class="w-6 text-center font-semibold text-gray-900">{{ $item['quantity'] }}</span>
                                            <button wire:click="increase({{ $id }})"
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded transition-colors">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Remove Button -->
                                        <button wire:click="remove({{ $id }})"
                                            class="text-red-500 hover:text-red-700 text-sm font-medium mt-3 transition-colors">
                                            Remove
                                        </button>
                                    </div>
                                </div>

                                <!-- Item Total -->
                                <div class="mt-4 text-right text-sm">
                                    <span class="text-gray-600">Item Total: </span>
                                    <span
                                        class="text-lg font-bold text-gray-900">₹{{ number_format($item['price'] * $item['quantity']) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 1C6.48 1 2 5.48 2 11s4.48 10 10 10 10-4.48 10-10S17.52 1 12 1zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                            Payment Method
                        </h2>

                        <div class="space-y-3">
                            <label @class([
                                'flex items-center gap-3 p-4 border-2 rounded-lg cursor-pointer hover:border-amber-500 transition-colors',
                                'border-amber-500 bg-amber-50' => $paymentMethod == 'cod',
                                'border-gray-200' => $paymentMethod != 'cod'
                            ])>
                                <input type="radio" wire:model="paymentMethod" value="cod" class="w-5 h-5 text-amber-500">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Cash on Delivery</p>
                                    <p class="text-xs text-gray-600 mt-1">Pay when you receive your order</p>
                                </div>
                            </label>

                            <label @class([
                                'flex items-center gap-3 p-4 border-2 rounded-lg cursor-pointer hover:border-amber-500 transition-colors',
                                'border-amber-500 bg-amber-50' => $paymentMethod == 'online',
                                'border-gray-200' => $paymentMethod != 'online'
                            ])>
                                <input type="radio" wire:model="paymentMethod" value="online"
                                    class="w-5 h-5 text-amber-500">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Online Payment</p>
                                    <p class="text-xs text-gray-600 mt-1">Pay via card, UPI, or netbanking</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <div class="bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl shadow-lg p-6 text-white">
                            <h2 class="text-xl font-bold mb-4">Price Summary</h2>

                            <div class="space-y-3 mb-4 pb-4 border-b border-white/30">
                                <div class="flex justify-between text-sm">
                                    <span>Subtotal</span>
                                    <span>₹{{ number_format($this->subtotal, 2) }}</span>
                                </div>

                                <div class="flex justify-between text-sm">
                                    <span>Discount</span>
                                    <span class="text-green-200">- ₹{{ number_format($this->discount, 2) }}</span>
                                </div>

                                <div class="flex justify-between text-sm">
                                    <span>Shipping</span>
                                    <span>Free</span>
                                </div>
                            </div>

                            <div class="flex justify-between text-2xl font-bold mb-6">
                                <span>Total Amount</span>
                                <span>₹{{ number_format($this->total, 2) }}</span>
                            </div>

                            @auth
                                @if($selectedAddressId)
                                    <button
                                        class="w-full py-4 bg-white text-amber-600 rounded-lg hover:bg-gray-100 font-bold text-lg transition-colors shadow-lg">
                                        Proceed to Checkout
                                    </button>
                                @else
                                    <button disabled
                                        class="w-full py-4 bg-gray-300 text-gray-500 rounded-lg cursor-not-allowed font-bold text-lg">
                                        Select Address First
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="block text-center w-full py-4 bg-white text-amber-600 rounded-lg hover:bg-gray-100 font-bold text-lg transition-colors">
                                    Login to Checkout
                                </a>
                            @endauth

                            <div class="mt-4 p-3 bg-white/20 rounded-lg">
                                <p class="text-xs text-white/90">
                                    ✓ Free Shipping on all orders<br>
                                    ✓ 100% Original Products<br>
                                    ✓ Easy Returns
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Modal -->
            @if($showAddressModal)
                <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
                    <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto shadow-2xl">
                        <div
                            class="sticky top-0 bg-gradient-to-r from-amber-500 to-orange-500 p-6 text-white flex justify-between items-center">
                            <h2 class="text-2xl font-bold">Add New Address</h2>
                            <button wire:click="$set('showAddressModal', false)" class="text-2xl hover:opacity-80">×</button>
                        </div>

                        <form wire:submit="saveAddress" class="p-8 space-y-4">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" wire:model="addressName"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="Enter your name">
                                    @error('addressName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone *</label>
                                    <input type="tel" wire:model="addressPhone"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="10-digit mobile number">
                                    @error('addressPhone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address Type</label>
                                    <select wire:model="addressType"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors">
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Landmark</label>
                                    <input type="text" wire:model="landmark"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="Nearby landmark">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Street Address *</label>
                                    <input type="text" wire:model="addressLine"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="House no., street name">
                                    @error('addressLine') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Area/Colony</label>
                                    <input type="text" wire:model="city"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="Area or locality">
                                    @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">City *</label>
                                    <input type="text" wire:model="state"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="City name">
                                    @error('state') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pincode *</label>
                                    <input type="text" wire:model="pincode"
                                        class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-amber-500 outline-none transition-colors"
                                        placeholder="6-digit pincode">
                                    @error('pincode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <label class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg cursor-pointer">
                                <input type="checkbox" wire:model="isDefault" class="w-5 h-5 text-amber-500 rounded">
                                <span class="text-gray-700 font-medium">Set as default address</span>
                            </label>

                            <div class="flex gap-3 pt-4">
                                <button type="button" wire:click="$set('showAddressModal', false)"
                                    class="flex-1 py-3 border-2 border-gray-300 rounded-lg hover:bg-gray-50 font-semibold transition-colors">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="flex-1 py-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-semibold transition-colors">
                                    Save Address
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        @else
            <!-- Empty Cart -->
            <div class="bg-white rounded-2xl shadow-sm p-16 text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Your cart is empty 🛒</h2>
                <p class="text-gray-600 mb-8 text-lg">Add some delicious snacks to get started!</p>
                <a href="{{ route('shop') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-lg hover:shadow-lg transition-all font-semibold text-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>