<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Main Categories
        $raw = Category::create([
            'title' => 'Raw Makhana',
            'description' => 'Natural raw makhana products'
        ]);

        $roasted = Category::create([
            'title' => 'Roasted Makhana',
            'description' => 'Healthy roasted makhana'
        ]);

        $flavored = Category::create([
            'title' => 'Flavored Makhana',
            'description' => 'Different flavored makhana'
        ]);

        // Sub Categories
        Category::create([
            'title' => 'Plain Raw',
            'parent_id' => $raw->id,
            'description' => 'Basic raw makhana'
        ]);

        Category::create([
            'title' => 'Premium Raw',
            'parent_id' => $raw->id,
            'description' => 'High quality raw makhana'
        ]);

        Category::create([
            'title' => 'Salted',
            'parent_id' => $roasted->id,
            'description' => 'Light salted makhana'
        ]);

        Category::create([
            'title' => 'Peri Peri',
            'parent_id' => $flavored->id,
            'description' => 'Spicy peri peri flavor'
        ]);

        Category::create([
            'title' => 'Chocolate',
            'parent_id' => $flavored->id,
            'description' => 'Sweet chocolate flavor'
        ]);

        // Extra random categories (optional)
        Category::factory()->count(5)->create();
    }
}