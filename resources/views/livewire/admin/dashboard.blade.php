<div>
    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Users Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Users</p>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($TotalUser) }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($TotalOrder) }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-800">₹{{ number_format($TotalAmout, 2) }}</p>
                </div>
                <div class="bg-yellow-100 rounded-full p-3">
                   <p class="  h-6 w-6 flex justify-center font-bold text-xl ">₹</p>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Products</p>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($TotalProduct) }}</p>
                    <p class="text-xs text-green-600 mt-1">{{ $TotalActiveProduct }} Active</p>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Status Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Pending Orders Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Pending Orders</h3>
                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                    Needs Attention
                </span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-bold text-orange-600">{{ number_format($Orderpanding) }}</p>
                    <p class="text-sm text-gray-500 mt-1">Orders awaiting processing</p>
                </div>
                <div class="bg-orange-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Completed Orders Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Completed Orders</h3>
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                    Achieved
                </span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-bold text-green-600">{{ number_format($orderCompleted) }}</p>
                    <p class="text-sm text-gray-500 mt-1">Successfully delivered</p>
                </div>
                <div class="bg-green-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Completion Rate:</span>
                    <span class="font-semibold text-green-600">
                        {{ $TotalOrder > 0 ? round(($orderCompleted / $TotalOrder) * 100, 1) : 0 }}%
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white rounded-lg shadow-md">
          <div class="flex justify-between">
             <div class=" px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
            <p class="text-sm text-gray-500">Latest 5 orders in the system</p>
    
        </div>
        <a href="{{ route('admin.manage.order') }}" class=" w-20 h-8  justify-center  m-2 p-1 text-sm  flex rounded font-medium hover:bg-gray-300 ">
           View all
        </a>
          </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($RecentOrder as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $order->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $order->user->name ?? 'Guest User' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                ₹{{ number_format($order->total_amount, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->status == 'completed') bg-green-100 text-green-800
                                    @elseif($order->status == 'panding') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                <button class="text-green-600 hover:text-green-900">Edit</button>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No orders found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

   
</div>