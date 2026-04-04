<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ $title ?? config('app.name') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
</head>
<body x-data="{ mobileMenuOpen: false }">
    <div class="min-h-screen bg-gray-100 flex">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="mobileMenuOpen" 
             @click="mobileMenuOpen = false"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden">
        </div>
        
        <!-- Sidebar -->
       <aside 
    :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-900 text-white transform md:translate-x-0 md:relative transition duration-300 ease-in-out">
    
    @include('layouts.navigation')
</aside>
        
        <!-- Main Content Area -->
        <div class="flex-1 min-w-0 flex flex-col">
            @include('layouts.header')
            
            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-6 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
    
    @livewireScripts
</body>
</html>