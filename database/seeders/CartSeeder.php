<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use App\Models\ProductVariant;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create one cart per user
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);

            // Add 1–3 items in each cart
            $variants = ProductVariant::inRandomOrder()
                ->take(rand(1, 3))
                ->get();

            foreach ($variants as $variant) {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_variant_id' => $variant->id,
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}