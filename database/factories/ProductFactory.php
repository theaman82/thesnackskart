<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->words(3, true);

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(100,999),
            'description' => fake()->sentence(),
            'featured_image' => null,
            'status' => true,
        ];
    }
}