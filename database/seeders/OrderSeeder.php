<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 orders
        $orders = Order::factory()->count(10)->create();

        foreach ($orders as $order) {

            $total = 0;

            // Add 1–3 items per order
            $variants = ProductVariant::inRandomOrder()
                ->take(rand(1, 3))
                ->get();

            foreach ($variants as $variant) {

                $quantity = rand(1, 3);
                $price = $variant->sale_price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_variant_id' => $variant->id,
                    'product_name' => $variant->product->title,
                    'variant_details' => ($variant->flavor ?? '') . ' ' . ($variant->weight ?? '') . $variant->weight_unit,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);

                $total += $price * $quantity;
            }

            // update total
            $order->update([
                'total_amount' => $total
            ]);
        }
    }
}