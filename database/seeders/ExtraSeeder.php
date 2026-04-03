<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Wishlists;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class ExtraSeeder extends Seeder
{
    public function run(): void
    {
        // Payments (1 per order)
        $orders = Order::all();

        foreach ($orders as $order) {
            Payment::factory()->create([
                'order_id' => $order->id,
            ]);
        }

        // Wishlist (random entries)
        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            $randomProducts = $products->random(rand(1, 3));

            foreach ($randomProducts as $product) {
                Wishlists::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
            }
        }

        // Reviews
        foreach ($products as $product) {
            Review::factory()
                ->count(rand(1, 3))
                ->create([
                    'product_id' => $product->id,
                ]);
        }
    }
}