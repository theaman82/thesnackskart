<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first();

        $method = fake()->randomElement(['cod', 'razorpay']);
        $status = $method === 'cod'
            ? 'pending'
            : fake()->randomElement(['success', 'failed']);

        return [
            'order_id' => $order->id,
            'payment_method' => $method,
            'currency' => 'INR',
            'amount' => $order->total_amount,
            'order_amount' => $order->total_amount,
            'payment_status' => $status,
            'paid_at' => $status === 'success' ? now() : null,

            'razorpay_payment_id' => $method === 'razorpay' ? 'pay_' . uniqid() : null,
            'razorpay_order_id' => $method === 'razorpay' ? 'order_' . uniqid() : null,
            'razorpay_signature' => $method === 'razorpay' ? uniqid() : null,

            'gateway_response' => null,
            'notes' => null,
            'failure_reason' => $status === 'failed' ? 'Payment failed' : null,
            'retry_count' => 0,
        ];
    }
}