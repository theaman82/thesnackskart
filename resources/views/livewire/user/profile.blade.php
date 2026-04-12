<div x-data="{ editing: false }" class="max-w-3xl mx-auto p-6 mt-10 bg-white shadow-md rounded-2xl">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Personal Information</h1>

        <div class="flex gap-2">
            <button x-show="!editing" @click="editing = true"
                class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition">
                Edit
            </button>

            <button x-show="editing" @click="editing = false"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                Cancel
            </button>
        </div>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="updateProfile">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Full Name -->
            <div class="md:col-span-2">
                <label class="block text-sm text-gray-600 mb-1">Full Name</label>
                <input type="text" wire:model="name" :disabled="!editing"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none"
                    :class="editing ? 'bg-white' : 'bg-gray-100'">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">Email Address</label>
                <input type="email" wire:model="email" :disabled="!editing"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none"
                    :class="editing ? 'bg-white' : 'bg-gray-100'">
            </div>

            <!-- Mobile -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">Mobile Number</label>
                <input type="text" wire:model="mobile" :disabled="!editing"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none"
                    :class="editing ? 'bg-white' : 'bg-gray-100'">
            </div>

            <!-- Gender -->
            <div class="md:col-span-2">
                <label class="block text-sm text-gray-600 mb-2">Gender</label>

                <div class="flex gap-6">
                    <label class="flex items-center gap-2">
                        <input type="radio" value="male" wire:model="gender" :disabled="!editing">
                        <span>Male</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" value="female" wire:model="gender" :disabled="!editing">
                        <span>Female</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" value="other" wire:model="gender" :disabled="!editing">
                        <span>Other</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div x-show="editing" class="mt-6">
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                Save Changes
            </button>
        </div>
    </form>

    <!-- Divider -->
    <hr class="my-8">

    <!-- Deactivate -->
    <div class="text-center">
        <button 
            class="px-6 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-50 transition">
            Deactivate Account
        </button>
    </div>
</div>