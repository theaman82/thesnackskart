<!-- Sidebar -->
<div>


    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold text-gray-700">My Account</h2>
    </div>

    <nav class="p-4 space-y-2">

        <!-- Profile -->
        <a href="{{ route('user.profile') }}" wire:navigate isActive class="flex items-center gap-3 px-4 py-2 rounded-lg  transition {{ request()->routeIs('user.profile')
    ? 'bg-amber-100 text-amber-700'
    : 'text-gray-700 hover:bg-amber-100 hover:text-amber-700' }}">
            👤 <span>Profile Information</span>
        </a>

        <!-- Orders -->
        <a href="{{ route('user.manage-order') }}" wire:navigate
            class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-amber-100 hover:text-amber-700 transition">
            📦 <span>Manage Orders</span>
        </a>
        <!-- Address -->
        <a href="{{ route('user.manage-address') }}" wire:navigate
            class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-amber-100 hover:text-amber-700 transition">
            📍 <span>Manage Address</span>
        </a>

        <!-- Wishlist -->
        <a href="#"
            class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-amber-100 hover:text-amber-700 transition">
            ❤️ <span>Wishlist</span>
        </a>



        <!-- Divider -->
        <div class="border-t my-3"></div>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 transition">
                🚪 <span>Logout</span>
            </button>
        </form>

    </nav>
</div>