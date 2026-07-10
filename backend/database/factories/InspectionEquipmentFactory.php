<?php

namespace Database\Factories;

use App\Models\InspectionEquipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InspectionEquipmentFactory extends Factory
{
    protected $model = InspectionEquipment::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'icon' => fake()->randomElement(['fas fa-search', 'fas fa-microscope', 'fas fa-ruler', 'fas fa-weight']),
            'status' => true,
            'order' => fake()->unique()->numberBetween(1, 15),
        ];
    }
}
