<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 products
        $products = Product::factory()->count(10)->create();

        // For each product, create 2–4 variants
        foreach ($products as $product) {
            ProductVariant::factory()
                ->count(rand(2, 4))
                ->create([
                    'product_id' => $product->id
                ]);
        }
    }
}