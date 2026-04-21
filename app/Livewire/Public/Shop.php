<?php

namespace App\Livewire\Public;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;

class Shop extends Component
{
    #[Url(keep: true)]
    public string $category = '';

    #[Url(keep: true)]
    public string $size = '';

    #[Url(keep: true)]
    public string $sort = 'latest';

    #[Url(keep: true)]
    public string $priceFrom = '';

    #[Url(keep: true)]
    public string $priceTo = '';

    #[Url(keep: true)]
    public string $search = '';

    #[Url(keep: true)]
    public int $perPage = 12;

    public bool $showAllCategories = false;

    public function render()
    {
        $query = Product::with(['category', 'variants', 'images'])
            ->where('status', true)
            ->whereHas('variants', function ($q) {
                $q->where('status', true);
            });

        // Filter by search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($cat) {
                        $cat->where('title', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Filter by category
        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        // Filter by price range
        if ($this->priceFrom || $this->priceTo) {
            $query->whereHas('variants', function ($q) {
                if ($this->priceFrom) {
                    $q->where('sale_price', '>=', $this->priceFrom);
                }
                if ($this->priceTo) {
                    $q->where('sale_price', '<=', $this->priceTo);
                }
            });
        }

        // Filter by size/weight
        if ($this->size) {
            $query->whereHas('variants', function ($q) {
                $q->where('weight', $this->size);
            });
        }

        // Sort
        match ($this->sort) {
            'price-low-high' => $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('products.*')
                ->orderBy('product_variants.sale_price', 'asc')
                ->groupBy('products.id'),
            'price-high-low' => $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('products.*')
                ->orderBy('product_variants.sale_price', 'desc')
                ->groupBy('products.id'),
            'oldest' => $query->orderBy('created_at', 'asc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        $products = $query->paginate($this->perPage);
        $allCategories = Category::all();
        
        // Show first 5 categories or all if showAllCategories is true
        $categories = $this->showAllCategories 
            ? $allCategories 
            : $allCategories->take(5);

        $sizes = Product::distinct()
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->pluck('product_variants.weight')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('livewire.public.shop', [
            'products' => $products,
            'categories' => $categories,
            'allCategories' => $allCategories,
            'sizes' => $sizes,
        ]);
    }

    public function clearFilters()
    {
        $this->reset(['category', 'size', 'priceFrom', 'priceTo', 'sort', 'search']);
        $this->showAllCategories = false;
    }

    public function toggleShowAllCategories()
    {
        $this->showAllCategories = !$this->showAllCategories;
    }

    public function addToCart($productId)
    {
        // Add to cart logic here
        $this->dispatch('cart-updated', productId: $productId);
    }

    #[Layout('layouts.app')]
    public function mount()
    {
        // Load initial category from URL if present
        if (request()->has('category')) {
            $categoryTitle = request('category');
            $category = Category::where('title', 'like', "%{$categoryTitle}%")->first();
            if ($category) {
                $this->category = $category->id;
            }
        }
    }
}
