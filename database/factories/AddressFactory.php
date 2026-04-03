<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'phone' => fake()->numerify('9#########'),
            'alt_phone' => fake()->optional()->numerify('8#########'),
            'address_type' => fake()->randomElement(['home', 'office', 'other']),
            'landmark' => fake()->optional()->word(),
            'street' => fake()->streetName(),
            'area' => fake()->citySuffix(),
            'address_line' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'pincode' => fake()->numerify('######'),
            'is_default' => false,
            'status' => true,
        ];
    }
}