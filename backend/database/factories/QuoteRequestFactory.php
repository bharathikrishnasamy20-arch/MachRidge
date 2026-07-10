<?php

namespace Database\Factories;

use App\Models\QuoteRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteRequestFactory extends Factory
{
    protected $model = QuoteRequest::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'company_name' => fake()->company(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'product_name' => fake()->words(3, true),
            'quantity' => fake()->numberBetween(10, 10000),
            'specifications' => fake()->paragraph(),
            'message' => fake()->paragraph(),
            'status' => fake()->randomElement(['pending', 'contacted', 'quoted', 'closed']),
        ];
    }
}
