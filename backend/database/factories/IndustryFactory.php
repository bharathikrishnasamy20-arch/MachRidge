<?php

namespace Database\Factories;

use App\Models\Industry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IndustryFactory extends Factory
{
    protected $model = Industry::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'icon' => fake()->randomElement(['fas fa-car', 'fas fa-plane', 'fas fa-oil-can', 'fas fa-ship']),
            'status' => true,
        ];
    }
}
