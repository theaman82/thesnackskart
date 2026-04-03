<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductVariant;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        $variant = ProductVariant::inRandomOrder()->first();

        return [
            'product_variant_id' => $variant->id,
            'product_name' => $variant->product->title ?? 'Makhana',
            'variant_details' => ($variant->flavor ?? '') . ' ' . ($variant->weight ?? '') . $variant->weight_unit,
            'price' => $variant->sale_price,
            'quantity' => fake()->numberBetween(1, 3),
        ];
    }
}