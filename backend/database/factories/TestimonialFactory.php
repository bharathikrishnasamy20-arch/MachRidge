<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'designation' => fake()->jobTitle(),
            'company' => fake()->company(),
            'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200',
            'content' => fake()->paragraph(),
            'rating' => fake()->numberBetween(4, 5),
            'status' => true,
        ];
    }
}
