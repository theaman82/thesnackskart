<div>
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">

            <div class="bg-white w-full max-w-2xl p-6 rounded-xl">

                <h2 class="text-xl font-semibold mb-4">
                    {{ $isEdit ? 'Edit Address' : 'Add Address' }}
                </h2>

                <div class="grid grid-cols-2 gap-3">

                    <input wire:model="name" class="border p-2 rounded" placeholder="Name">
                    <input wire:model="phone" class="border p-2 rounded" placeholder="Phone">

                    <input wire:model="alt_phone" class="border p-2 rounded" placeholder="Alt Phone">

                    <select wire:model="address_type" class="border p-2 rounded">
                        <option value="">Type</option>
                        <option value="home">Home</option>
                        <option value="office">Office</option>
                        <option value="other">Other</option>
                    </select>

                    <input wire:model="landmark" class="border p-2 rounded" placeholder="Landmark">
                    <input wire:model="street" class="border p-2 rounded" placeholder="Street">

                    <input wire:model="area" class="border p-2 rounded" placeholder="Area">
                    <input wire:model="address_line" class="border p-2 rounded" placeholder="Address Line">

                    <input wire:model="city" class="border p-2 rounded" placeholder="City">
                    <input wire:model="state" class="border p-2 rounded" placeholder="State">

                    <input wire:model="pincode" class="border p-2 rounded" placeholder="Pincode">

                    <label>
                        <input type="checkbox" wire:model="is_default"> Default
                    </label>
                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <button wire:click="$set('showModal', false)" class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>