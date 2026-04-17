<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">
    <div>
        <x-navbar />
    </div>
    <div class="flex gap-2 w-full">
        <div class="w-2/12 h-screen fixed shadow-md hidden md:block">
            <x-user-sidebar />
        </div>
        <div class="w-10/12 h-screen ml-[17%]">
            {{ $slot }}
        </div>
    </div>


    @livewireScripts
</body>

</html>