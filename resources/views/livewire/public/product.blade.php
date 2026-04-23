<div>
    <section id="featured" @class(['py-16', 'md:py-20', 'bg-white'])>
        <div @class(['max-w-7xl', 'mx-auto', 'px-4', 'sm:px-6', 'lg:px-8'])>
            <!-- Minimal & Modern Header -->
            <div @class(['text-center', 'mb-12', 'md:mb-16'])>
                <h2 @class(['text-3xl', 'md:text-4xl', 'lg:text-5xl', 'font-bold', 'tracking-tight', 'text-gray-900', 'mb-3'])>
                    Featured <span @class=['text-amber-500']>Products</span>
                </h2>
                <p @class(['text-gray-500', 'text-base', 'max-w-md', 'mx-auto'])>
                    Crispy, crunchy & perfectly roasted
                </p>
            </div>

            <!-- Products Grid - Clean Card Design -->
            <div @class(['grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-4', 'gap-4', 'sm:gap-6'])>
                @foreach($products as $product)
                    @php
                        $mrp = $product->variants->first()->mrp ?? 0;
                        $salePrice = $product->variants->first()->sale_price ?? 0;
                        $discount = $mrp > 0 ? round(($mrp - $salePrice) / $mrp * 100) : 0;
                        $imageUrl = asset('storage/' . ($product->images->first()->image_url ?? 'default.png'));
                    @endphp

                    <!-- Minimal Card -->
                    <div @class(['group', 'relative'])>
                        <a href="{{ route('view-products', $product->slug) }}" @class(['block'])>
                            <!-- Image Circle Container - Modern look -->
                            <div @class([
                                'relative', 
                                'overflow-hidden', 
                                'rounded-2xl', 
                                'bg-amber-50', 
                                'aspect-square', 
                                'mb-4',
                                'shadow-sm',
                                'group-hover:shadow-md',
                                'transition-all',
                                'duration-300'
                            ])>
                                <img src="{{ $imageUrl }}"
                                     alt="{{ $product->title }}"
                                     @class([
                                         'w-full', 
                                         'h-full', 
                                         'object-cover', 
                                         'p-4',
                                         'group-hover:scale-105', 
                                         'transition-transform', 
                                         'duration-400',
                                         'ease-out'
                                     ])>

                                <!-- Discount Badge - Small & Clean -->
                                @if($discount > 0)
                                    <div @class([
                                        'absolute', 
                                        'top-2', 
                                        'right-2', 
                                        'bg-amber-500', 
                                        'text-white', 
                                        'text-[10px]', 
                                        'font-bold', 
                                        'px-1.5', 
                                        'py-0.5', 
                                        'rounded-full'
                                    ])>
                                        {{ $discount }}% OFF
                                    </div>
                                @endif
                            </div>

                            <!-- Product Info - Minimal -->
                            <div @class(['text-center'])>
                                <!-- Category -->
                                <p @class(['text-[10px]', 'uppercase', 'tracking-wider', 'text-amber-500', 'font-semibold', 'mb-1'])>
                                    {{ $product->category->title ?? 'MAKHANA' }}
                                </p>

                                <!-- Title -->
                                <h3 @class([
                                    'font-medium', 
                                    'text-gray-800', 
                                    'text-sm', 
                                    'sm:text-base', 
                                    'mb-2',
                                    'line-clamp-2',
                                    'px-1',
                                    'group-hover:text-amber-600',
                                    'transition-colors',
                                    'duration-200'
                                ])>
                                    {{ $product->title }}
                                </h3>

                                <!-- Price -->
                                <div @class(['flex', 'items-center', 'justify-center', 'gap-2', 'mb-3'])>
                                    <span @class(['text-base', 'sm:text-lg', 'font-bold', 'text-gray-900'])>
                                        ₹{{ number_format($salePrice) }}
                                    </span>
                                    @if($mrp > $salePrice)
                                        <span @class(['text-xs', 'text-gray-400', 'line-through'])>
                                            ₹{{ number_format($mrp) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </a>

                        <!-- Add to Cart Button - Simple & Clean -->
                        <button wire:click="addToCart({{ $product->id }})"
                                @class([
                                    'w-full',
                                    'cursor-pointer',
                                    'bg-gray-900',
                                    'text-white',
                                    'text-sm',
                                    'font-medium',
                                    'py-2.5',
                                    'rounded-xl',
                                    'hover:bg-amber-500',
                                    'transition-all',
                                    'duration-200',
                                    'flex',
                                    'items-center',
                                    'justify-center',
                                    'gap-2'
                                ])>
                            <svg @class(['w-3.5', 'h-3.5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4" />
                            </svg>
                            Add
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div @class(['text-center', 'mt-12', 'md:mt-16'])>
                <a href="{{ route('shop') }}"
                   @class([
                       'inline-flex',
                       'items-center',
                       'gap-2',
                       'px-6',
                       'py-3',
                       'border',
                       'border-gray-300',
                       'text-gray-700',
                       'rounded-full',
                       'hover:bg-gray-900',
                       'hover:text-white',
                       'hover:border-gray-900',
                       'transition-all',
                       'duration-200',
                       'text-sm',
                       'font-medium'
                   ])>
                    View All Products
                    <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>