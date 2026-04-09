<div class="p-4 md:p-6 max-w-2xl mx-auto">
    
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Add New Category</h2>
        </div>

        <form wire:submit="save" class="p-6 space-y-6">
            
            <!-- Parent Category -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Parent Category <span class="text-gray-400">(Optional)</span>
                </label>
                <select 
                    wire:model="parent_id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                    <option value="">No Parent</option>
                    
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                {{ $category->id == $parent_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Category Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    wire:model="title"
                    placeholder="Enter category name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                @error('title')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description <span class="text-gray-400">(Optional)</span>
                </label>
                <textarea 
                    wire:model="description"
                    rows="4"
                    placeholder="Write short description about this category..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition resize-y"></textarea>
                @error('description')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-xl transition duration-200 flex items-center justify-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Save Category
                </button>
            </div>
        </form>
    </div>

    <!-- Back Button -->
    <div class="mt-6 text-center">
        <a href="{{ route('admin.dashboard') }}" 
           class="text-gray-500 hover:text-gray-700 text-sm flex items-center justify-center gap-2">
            ← Back to Dashboard
        </a>
    </div>
</div>