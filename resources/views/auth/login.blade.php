<x-guest-layout>

    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
        Welcome Back 👋
    </h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none"
                placeholder="Enter your email"
                required
            >
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input 
                type="password" 
                name="password"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none"
                placeholder="Enter your password"
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded text-orange-500">
                Remember me
            </label>

            <a href="{{ route('password.request') }}" class="text-orange-500 hover:underline">
                Forgot password?
            </a>
        </div>

        <!-- Button -->
        <button 
            type="submit"
            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg font-medium transition duration-200"
        >
            Login
        </button>

        <!-- Divider -->
        <div class="text-center text-gray-400 text-sm">OR</div>

        <!-- Register -->
        <p class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-orange-500 font-medium hover:underline">
                Sign up
            </a>
        </p>

    </form>

</x-guest-layout>