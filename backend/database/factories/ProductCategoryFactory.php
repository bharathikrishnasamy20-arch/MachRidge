<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'icon' => fake()->randomElement(['fas fa-cogs', 'fas fa-industry', 'fas fa-tools', 'fas fa-wrench']),
            'status' => true,
            'order' => fake()->unique()->numberBetween(1, 10),
        ];
    }
}
