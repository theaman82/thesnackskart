<x-guest-layout>

    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
        Create Account 🚀
    </h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Full Name</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name') }}"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none"
                placeholder="Enter your name"
                required
            >
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

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
                placeholder="Create password"
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input 
                type="password" 
                name="password_confirmation"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none"
                placeholder="Confirm password"
                required
            >
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button -->
        <button 
            type="submit"
            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg font-medium transition duration-200"
        >
            Register
        </button>

        <!-- Divider -->
        <div class="text-center text-gray-400 text-sm">OR</div>

        <!-- Login Link -->
        <p class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-orange-500 font-medium hover:underline">
                Login here
            </a>
        </p>

    </form>

</x-guest-layout>