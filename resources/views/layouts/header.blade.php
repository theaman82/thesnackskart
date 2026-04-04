<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
    <div class="px-4 sm:px-6 py-3">
        <div class="flex items-center justify-between">
            <!-- Left Section: Mobile Menu Button + Page Title -->
            <div class="flex items-center gap-3">
                <!-- Mobile Menu Button (visible only on mobile) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Breadcrumb / Page Title -->
                <div class="hidden sm:block">
                    <h1 class="text-xl font-semibold text-gray-800">
                        {{ $title ?? 'Dashboard' }}
                    </h1>
                    <p class="text-xs text-gray-500 mt-0.5">Welcome back, Admin</p>
                </div>
            </div>

            <!-- Right Section: Search, Notifications, Profile -->
            <div class="flex items-center gap-2 sm:gap-4">
                <!-- Search Bar - Desktop -->
                {{-- <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" 
                           placeholder="Search..." 
                           class="bg-transparent outline-none ml-2 text-sm w-64 text-gray-700 placeholder-gray-500">
                </div> --}}

                <!-- Search Button - Mobile -->
                {{-- <button class="md:hidden text-gray-600 hover:text-gray-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button> --}}

                <!-- Notifications -->
                {{-- <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="text-gray-600 hover:text-gray-900 relative focus:outline-none">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                    </button>
                    
                    <!-- Dropdown -->
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50 hidden md:block">
                        <div class="p-3 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Notifications</h3>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <div class="p-3 hover:bg-gray-50 transition cursor-pointer">
                                <p class="text-sm text-gray-800">New user registered</p>
                                <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                            </div>
                            <div class="p-3 hover:bg-gray-50 transition cursor-pointer border-t border-gray-100">
                                <p class="text-sm text-gray-800">Server update completed</p>
                                <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                            </div>
                            <div class="p-3 hover:bg-gray-50 transition cursor-pointer border-t border-gray-100">
                                <p class="text-sm text-gray-800">Monthly report ready</p>
                                <p class="text-xs text-gray-500 mt-1">3 hours ago</p>
                            </div>
                        </div>
                        <div class="p-3 border-t border-gray-200 text-center">
                            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-700">View all notifications</a>
                        </div>
                    </div>
                </div> --}}

                <!-- User Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="flex items-center gap-2 focus:outline-none group">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white text-sm font-bold shadow-md">
                             {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                            {{-- <p class="text-xs text-gray-500">Administrator</p> --}}
                        </div>
                        <svg class="hidden sm:block w-4 h-4 text-gray-500 group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 z-50">
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            My Profile
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                        <hr class="my-1 border-gray-200">
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Search (visible only on mobile) -->
        {{-- <div class="md:hidden mt-3">
            <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" 
                       placeholder="Search..." 
                       class="bg-transparent outline-none ml-2 text-sm w-full text-gray-700 placeholder-gray-500">
            </div>
        </div> --}}
    </div>
</header>