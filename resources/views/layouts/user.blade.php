<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div>
        <x-navbar />
    </div>
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <x-user-sidebar />
        </aside>
    </div>
    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>