<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Create New Product</h1>
        <p class="text-gray-600 mt-1">Add a new product with multiple variants</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm" role="alert">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <form wire:submit="save" enctype="multipart/form-data">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">Product Information</h2>
            </div>

            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category <span
                                class="text-red-500">*</span></label>
                        <select wire:model="categoryId"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name ?? $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoryId')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center space-x-3 mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model="status" value="1"
                                    class="rounded-full border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Active</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model="status" value="0"
                                    class="rounded-full border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model.live="title"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g., Gourmet Coffee Beans">
                    @error('title')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model.live="slug"
                        class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="auto-generated-from-title">
                    @error('slug')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">URL-friendly version of the title. Auto-generated but can be
                        edited.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea wire:model="description" rows="4"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Detailed product description..."></textarea>
                    @error('description')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Variants Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Product Variants</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Add different variations like size, flavor, or pack type</p>
                </div>
                <button type="button" wire:click="addVariant"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-150 ease-in-out shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Variant
                </button>
            </div>

            <div class="p-6 space-y-6">
                @foreach ($variants as $index => $variant)
                    <div wire:key="variant-{{ $index }}" 
                        class="border border-gray-200 rounded-lg overflow-hidden bg-white shadow-sm hover:shadow-md transition-shadow">
                        <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-medium text-gray-700">Variant #{{ $index + 1 }}</h3>
                            @if (count($variants) > 1)
                                <button type="button" wire:click="removeVariant({{ $index }})"
                                    class="text-red-600 hover:text-red-800 text-sm font-medium inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Remove
                                </button>
                            @endif
                        </div>

                        <div class="p-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">SKU <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" wire:model="variants.{{ $index }}.sku"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="Unique SKU">
                                    @error("variants.{$index}.sku")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Flavor / Name</label>
                                    <input type="text" wire:model="variants.{{ $index }}.flavor"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="e.g., Vanilla, 1kg Pack">
                                    @error("variants.{$index}.flavor")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Weight</label>
                                    <div class="flex space-x-2">
                                        <input type="number" step="0.01"
                                            wire:model="variants.{{ $index }}.weight"
                                            class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                            placeholder="0.00">
                                        <select wire:model="variants.{{ $index }}.weight_unit"
                                            class="w-20 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                            <option value="g">g</option>
                                            <option value="kg">kg</option>
                                            <option value="ml">ml</option>
                                            <option value="l">L</option>
                                        </select>
                                    </div>
                                    @error("variants.{$index}.weight")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Pack Type</label>
                                    <input type="text" wire:model="variants.{{ $index }}.pack_type"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="Pouch, Jar, Box">
                                    @error("variants.{$index}.pack_type")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">MRP (₹) <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" step="0.01" wire:model="variants.{{ $index }}.mrp"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="0.00">
                                    @error("variants.{$index}.mrp")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Sale Price (₹) <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" step="0.01" wire:model="variants.{{ $index }}.sale_price"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="0.00">
                                    @error("variants.{$index}.sale_price")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Stock <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" wire:model="variants.{{ $index }}.stock"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                        placeholder="0">
                                    @error("variants.{$index}.stock")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Variant Image</label>
                                    <input type="file" wire:key="image-{{ $index }}" wire:model="variantImages.{{ $index }}"
                                        class="w-full text-sm text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    @error("variantImages.{$index}")
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                    @if (isset($variantImages[$index]))
                                        <div class="mt-2 text-xs text-green-600">Image selected:
                                            {{ $variantImages[$index]->getClientOriginalName() }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-3">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
                Create Product
            </button>
        </div>
    </form>
</div>