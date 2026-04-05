<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ $title ?? config('app.name') }}</title>
    
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Added x-data here -->
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen bg-gray-100 flex h-screen overflow-hidden">

        <!-- Mobile Overlay -->
        <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false"
            x-transition:enter="transition-opacity ease-out duration-300" 
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" 
            x-transition:leave="transition-opacity ease-in duration-200"
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/60 z-20 md:hidden">
        </div>

        <!-- Sidebar -->
        <aside x-data="{ collapsed: false }"
            :class="{
                'fixed inset-y-0 left-0 z-30 w-64 shadow-2xl': true,
                'translate-x-0': mobileMenuOpen,
                '-translate-x-full': !mobileMenuOpen,
                'md:relative md:translate-x-0': true,
                'md:w-20': collapsed,
                'md:w-64': !collapsed
            }"
            class="bg-gradient-to-br from-gray-900 to-gray-800 text-white transition-all duration-300 ease-in-out transform flex flex-col h-full">

            <!-- Mobile Close Button -->
            <div class="flex justify-end p-3 md:hidden border-b border-gray-700">
                <button @click="mobileMenuOpen = false" class="text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            @include('layouts.navigation')
        </aside>

        <!-- Right Side -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Header -->
            @include('layouts.header')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-white">
                {{ $slot }}
            </main>

        </div>
    </div>

    @filamentScripts
    @livewireScripts
    @vite('resources/js/app.js')


    
</body>
</html>