<nav x-data="{ collapsed: false }" :class="{ 'w-20': collapsed, 'w-64': !collapsed }"
    class="bg-gradient-to-br from-gray-900 to-gray-800 text-white h-full transition-all duration-300 ease-in-out shadow-xl">

    <div class="flex flex-col h-full">
        <!-- Logo/Brand Area -->
        <div class="px-4 py-6 border-b border-gray-700/50 flex items-center justify-between">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>
                </div>
                <span x-show="!collapsed" class="font-bold text-lg whitespace-nowrap">AdminPanel</span>
            </div>

            <!-- Collapse Toggle Button (Desktop only) -->
            <button @click="collapsed = !collapsed"
                class="hidden md:flex text-gray-400 hover:text-white transition-all duration-200">
                <svg x-show="!collapsed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                </svg>
                <svg x-show="collapsed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 py-6 px-3 space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-gray-700/70 text-indigo-400' : 'text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span x-show="!collapsed" class="text-sm font-medium whitespace-nowrap">Dashboard</span>
            </a>

            <div x-data="{ categoryOpen: false }" class="relative">
                <!-- Parent Category Link -->
                <a href="#" @click.prevent="categoryOpen = !categoryOpen"
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:bg-gray-700/50 transition-all duration-200 text-gray-300 group">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span x-show="!collapsed" class="text-sm font-medium whitespace-nowrap">Categories</span>
                    </div>
                    <!-- Dropdown Arrow -->
                    <svg x-show="!collapsed" x-bind:class="{ 'rotate-180': categoryOpen }"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>

                <!-- Dropdown Menu Items -->
                <div x-show="categoryOpen && !collapsed" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0" class="ml-8 mt-1 space-y-1">

                    <!-- Insert Category -->
                    <a href="{{ route('category.create') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700/40 transition-all duration-200 text-gray-400 text-sm group">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span>Add Category</span>
                    </a>

                    <!-- View Categories -->
                    <a href=""
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700/40 transition-all duration-200 text-gray-400 text-sm group">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <span>View All Categories</span>
                    </a>
                </div>
            </div>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-700/50 transition-all duration-200 text-gray-300 group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <span x-show="!collapsed" class="text-sm font-medium whitespace-nowrap">Users</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-700/50 transition-all duration-200 text-gray-300 group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span x-show="!collapsed" class="text-sm font-medium whitespace-nowrap">Settings</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-700/50 transition-all duration-200 text-gray-300 group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8h18M5 8V6a2 2 0 012-2h10a2 2 0 012 2v2M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                    </path>
                </svg>
                <span x-show="!collapsed" class="text-sm font-medium whitespace-nowrap">Products</span>
            </a>
        </div>

        <!-- User Profile Section -->
        <div class="px-3 pb-6 pt-4 border-t border-gray-700/50">
            <div
                class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-700/30 transition-all duration-200 cursor-pointer group">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white text-xs font-bold shadow-md">
                    AD
                </div>
                <div x-show="!collapsed" class="flex flex-col">
                    <span class="text-sm font-medium text-white">Admin User</span>
                    <span class="text-xs text-gray-400">administrator</span>
                </div>
            </div>
        </div>
    </div>
</nav>
