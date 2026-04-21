<div>
<section id="featured" @class(['py-16', 'px-4', 'bg-gray-50'])>
        <div @class(['max-w-7xl', 'mx-auto'])>
            <!-- Simple Header -->
            <div @class(['text-center', 'mb-12'])>
                <h2 @class(['text-3xl', 'md:text-4xl', 'font-bold', 'text-gray-800', 'mb-3'])>
                    Featured  Products
                </h2>
                <p @class(['text-gray-600'])>Shop our best selling makhana varieties</p>
            </div>

            <div @class(['grid', 'grid-cols-1', 'sm:grid-cols-2', 'lg:grid-cols-3', 'xl:grid-cols-4', 'gap-6'])>
                <!-- Card 1 - Roasted Makhana (Amber Theme) -->
                @foreach($products as $product) 
                    <!-- <a href="{{ route('view-products', $product->slug) }}"> -->
                        <div
                            @class(['group', 'bg-white', 'rounded-xl', 'overflow-hidden', 'shadow-md', 'hover:shadow-xl', 'transition-all', 'duration-300', 'hover:-translate-y-1'])>
                            <div @class(['relative', 'overflow-hidden'])>
                                <img src="/banner/1736159404-Cream-Onion.jpg" alt="Roasted Makhana"
                                    @class(['w-full', 'object-cover', 'group-hover:scale-105', 'transition', 'duration-300'])>
                                <button
                                    @class(['absolute', 'top-3', 'right-3', 'w-8', 'h-8', 'bg-white', 'rounded-full', 'flex', 'items-center', 'justify-center', 'shadow-md', 'hover:bg-red-50', 'transition'])>
                                    <svg @class(['w-4', 'h-4', 'text-gray-400', 'hover:text-red-500']) fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div @class(['p-4'])>
                                <div @class(['flex', 'justify-between', 'items-start', 'mb-2'])>
                                    <h3 @class(['font-semibold', 'text-gray-800'])>{{ $product->title}} ({{ $product->category->title }})</h3>
                                </div>
                                <div @class(['flex', 'items-center', 'mb-2'])>
                                    <div @class(['flex', 'text-amber-400', 'text-sm'])>★★★★★</div>
                                    <span @class(['text-xs', 'text-gray-500', 'ml-2'])>(4.8k)</span>
                                </div>
                                <div @class(['flex', 'items-center', 'justify-between'])>
                                    <div>
                                        <span @class(['text-xl', 'font-bold', 'text-gray-900'])>₹{{ $product->variants->first()->sale_price ?? 'N/A' }}
                                    </span>
                                        <span @class(['text-sm', 'text-gray-400', 'line-through', 'ml-2'])>₹{{ $product->variants->first()->mrp ?? 'N/A' }}</span>
                                    </div>
                                    <span @class(['text-xs', 'bg-green-100', 'text-green-700', 'px-2', 'py-1', 'rounded'])>{{round(($product->variants->first()->mrp-$product->variants->first()->sale_price)/($product->variants->first()->mrp)*100)}}% off</span>
                                </div>
                                <button wire:click="addToCart({{ $product->id }})"
                                    @class(['w-full', 'cursor-pointer', 'mt-4', 'bg-amber-500', 'text-white', 'py-2', 'rounded-lg', 'hover:bg-amber-600', 'transition', 'flex', 'items-center', 'justify-center', 'gap-2'])>
                                    <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    <!-- </a> -->
                @endforeach

              
            </div>

            <!-- View All Button -->
            <div @class(['text-center', 'mt-12'])>
                <a href=""
                    @class(['inline-block', 'px-8', 'py-3', 'bg-gray-900', 'text-white', 'rounded-lg', 'hover:bg-gray-800', 'transition', 'shadow-md'])>
                    View All Products →
                </a>
            </div>
        </div>
    </section>
</div>
