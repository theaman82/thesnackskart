<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Address;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $address = Address::where('user_id', $user->id)->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'address_id' => $address?->id,

            // snapshot data
            'customer_name' => $address?->name ?? fake()->name(),
            'phone' => $address?->phone ?? fake()->numerify('9#########'),

            'landmark' => $address?->landmark,
            'street' => $address?->street,
            'area' => $address?->area,
            'address_line' => $address?->address_line,

            'city' => $address?->city ?? fake()->city(),
            'state' => $address?->state ?? fake()->state(),
            'pincode' => $address?->pincode ?? fake()->numerify('######'),

            'total_amount' => 0, // will update later
            'status' => fake()->randomElement([
                'pending','confirmed','processing','shipped','delivered'
            ]),
            'payment_status' => fake()->randomElement([
                'pending','paid'
            ]),
            'placed_at' => now(),
        ];
    }
}