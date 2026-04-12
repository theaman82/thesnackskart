<div class="max-w-6xl mx-auto p-4 md:p-6 bg-gray-100 min-h-screen">

    <!-- Search Bar -->
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <input type="text" placeholder="Search your orders here"
            class="flex-1 px-5 py-4 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button
            class="px-6 py-4 bg-blue-600 text-white rounded-lg font-medium shadow hover:bg-blue-700 transition flex items-center justify-center gap-2 min-w-[180px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Search Orders
        </button>
    </div>

    <!-- Orders List -->
    <div class="space-y-4">

        <!-- Order Card 1 -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-sm hover:shadow-md transition">
            <div class="flex flex-col lg:flex-row lg:items-center gap-5">

                <!-- Product Info -->
                <div class="flex items-start gap-4 flex-1 min-w-0">
                    <div
                        class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                        <img src="https://via.placeholder.com/100x100" alt="Product" class="w-full h-full object-cover">
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            Kilos Basket (4 items)
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">4 Delivered</p>

                        <div
                            class="mt-3 inline-block px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-700 border border-gray-200">
                            + 3 More Items
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="lg:w-32 text-left lg:text-center">
                    <p class="text-xl font-semibold text-gray-900">₹317</p>
                </div>

                <!-- Status -->
                <div class="lg:w-64">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        <p class="font-semibold text-gray-900">Delivered on Mar 25</p>
                    </div>
                    <p class="text-sm text-gray-600">Your item has been delivered</p>
                </div>
            </div>
        </div>

        <!-- Order Card 2 -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-sm hover:shadow-md transition">
            <div class="flex flex-col lg:flex-row lg:items-center gap-5">

                <div class="flex items-start gap-4 flex-1 min-w-0">
                    <div
                        class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                        <img src="https://via.placeholder.com/100x100" alt="Product" class="w-full h-full object-cover">
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            boAt BassHeads 211 Wired Earphones, 10mm Drivers
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Color: Black, Red</p>
                    </div>
                </div>

                <div class="lg:w-32 text-left lg:text-center">
                    <p class="text-xl font-semibold text-gray-900">₹357</p>
                </div>

                <div class="lg:w-64 space-y-3">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-3 h-3 rounded-full bg-green-500"></span>
                            <p class="font-semibold text-gray-900">Delivered on Mar 07</p>
                        </div>
                        <p class="text-sm text-gray-600">Your item has been delivered</p>
                    </div>

                    <button class="text-blue-600 font-medium text-sm hover:text-blue-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.068-3.292z" />
                        </svg>
                        Rate & Review Product
                    </button>
                </div>
            </div>
        </div>

        <!-- Order Card 3 -->
        <div class="bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-sm hover:shadow-md transition">

            <!-- Shared Tag -->
            <div
                class="inline-flex items-center px-4 py-2 rounded-full bg-amber-100 text-amber-800 text-sm font-medium mb-5">
                Shivam Kumar shared this order with you.
            </div>

            <div class="flex flex-col lg:flex-row lg:items-center gap-5">
                <div class="flex items-start gap-4 flex-1 min-w-0">
                    <div
                        class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                        <img src="https://via.placeholder.com/100x100" alt="Product" class="w-full h-full object-cover">
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            Janasya Women A-line Yellow, Light Green Kurta
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Color: Yellow, Light Green</p>
                        <p class="text-sm text-gray-500">Size: M</p>
                    </div>
                </div>

                <div class="lg:w-32 text-left lg:text-center">
                    <p class="text-xl font-semibold text-gray-900">₹682</p>
                </div>

                <div class="lg:w-64">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        <p class="font-semibold text-gray-900">Delivered on Jan 23</p>
                    </div>
                    <p class="text-sm text-gray-600">Your item has been delivered</p>
                </div>
            </div>
        </div>

    </div>
</div>