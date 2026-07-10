<?php

namespace Database\Factories;

use App\Models\Capability;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CapabilityFactory extends Factory
{
    protected $model = Capability::class;

    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);

        return [
            'title' => ucwords($title),
            'slug' => Str::slug($title),
            'description' => fake()->paragraphs(2, true),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'icon' => fake()->randomElement(['fas fa-cogs', 'fas fa-industry', 'fas fa-tools', 'fas fa-wrench']),
            'status' => true,
            'order' => fake()->unique()->numberBetween(1, 10),
        ];
    }
}
