<div class="max-w-5xl mx-auto p-4 md:p-6 bg-gray-100 min-h-screen">

    <!-- Header -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Manage Addresses</h1>

    <!-- Add New Address -->
    <div
        class="bg-white border border-gray-200 rounded-lg px-5 py-4 mb-6 flex items-center gap-3 cursor-pointer hover:bg-gray-50 transition">
        <span class="text-blue-600 text-xl font-bold">+</span>
        <span class="text-blue-600 font-medium">ADD A NEW ADDRESS</span>
    </div>

    <!-- Address List -->
    <div class="space-y-4">

        <!-- Address Card 1 -->
        <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">
            <div class="flex justify-between items-start">

                <div class="flex-1">
                    <!-- Tag -->
                    <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-1 rounded">
                        HOME
                    </span>

                    <!-- Name + Phone -->
                    <div class="mt-2 font-semibold text-gray-900">
                        Aman Kumar &nbsp;&nbsp; 8227046826
                    </div>

                    <!-- Address -->
                    <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                        Madhuri sadan, Shastri Nagar Madhubani, near puja general Store, Madhubani,
                        Shastri Nagar Road, Rani Nagar, Purnia, Bihar - 854301
                    </p>
                </div>

                <!-- 3 Dots Menu -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-lg shadow-lg z-10">

                        <button class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                            Edit
                        </button>

                        <button class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address Card 2 -->
        <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">
            <div class="flex justify-between items-start">

                <div class="flex-1">
                    <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-1 rounded">
                        HOME
                    </span>

                    <div class="mt-2 font-semibold text-gray-900">
                        Vikash &nbsp;&nbsp; 7250407215
                    </div>

                    <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                        Madhubani, shastri nagar, uday general Store, madhuri sadan, purnea, Madhubani,
                        Purnia, Bihar - 854301
                    </p>
                </div>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-lg shadow-lg z-10">

                        <button class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                            Edit
                        </button>

                        <button class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>