<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(4, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'short_description' => fake()->sentence(12),
            'category_id' => ProductCategory::factory(),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'gallery' => [
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            ],
            'specifications' => [
                ['label' => 'Material', 'value' => 'Stainless Steel'],
                ['label' => 'Tolerance', 'value' => '+/- 0.01mm'],
                ['label' => 'Finish', 'value' => 'Mirror Polish'],
            ],
            'applications' => fake()->sentence(20),
            'industries_served' => 'Automotive, Aerospace, Industrial',
            'meta_title' => fake()->sentence(5),
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => 'manufacturing, machining, components',
            'status' => true,
            'featured' => fake()->boolean(30),
            'order' => fake()->unique()->numberBetween(1, 50),
        ];
    }
}
