<div class="">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Categories</h1>
        <a href="{{ route('category.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            + Add New Category
        </a>
    </div>

    {{ $this->table }}
</div>