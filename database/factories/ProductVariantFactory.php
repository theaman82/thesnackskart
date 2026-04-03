<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductVariantFactory extends Factory
{
    public function definition(): array
    {
        $flavors = ['Peri Peri', 'Salted', 'Pudina', 'Chocolate', 'Plain'];

        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'sku' => 'SKU-' . strtoupper(uniqid()),
            'flavor' => fake()->randomElement($flavors),
            'weight' => fake()->randomElement([50, 100, 200, 250, 500]),
            'weight_unit' => 'g',
            'pack_type' => fake()->randomElement(['pouch', 'jar']),
            'mrp' => fake()->numberBetween(100, 500),
            'sale_price' => fake()->numberBetween(80, 450),
            'stock' => fake()->numberBetween(0, 100),
            'image' => null,
            'status' => true,
        ];
    }
}