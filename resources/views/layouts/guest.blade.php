<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Thesnackskart</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-yellow-100 via-orange-100 to-red-100 font-[Poppins]">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md p-5">

            <!-- Logo + Brand -->
            <div class="text-center mb-6">
                <a href="/" class="text-3xl cursor-pointer font-bold text-orange-600">🍿 Thesnackskart</a>
                <p class="text-gray-500 text-sm">Fresh Snacks • Nuts • Makhana</p>
            </div>

            <!-- Card -->
            <div class="bg-white shadow-xl rounded-2xl p-6">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-gray-500 mt-4">
                © {{ date('Y') }} Thesnackskart. All rights reserved.
            </p>

        </div>

    </div>

</body>

</html>