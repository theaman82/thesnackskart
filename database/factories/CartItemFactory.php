<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\ProductVariant;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cart_id' => Cart::inRandomOrder()->first()->id,
            'product_variant_id' => ProductVariant::inRandomOrder()->first()->id,
            'quantity' => fake()->numberBetween(1, 5),
        ];
    }
}