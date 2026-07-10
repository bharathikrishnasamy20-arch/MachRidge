<?php

namespace Database\Factories;

use App\Models\HeroSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroSliderFactory extends Factory
{
    protected $model = HeroSlider::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'subtitle' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'btn_text' => 'Learn More',
            'btn_link' => '#',
            'btn2_text' => 'Get a Quote',
            'btn2_link' => '#',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920',
            'bg_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920',
            'overlay_opacity' => 0.5,
            'order' => fake()->unique()->numberBetween(1, 10),
            'status' => true,
        ];
    }
}
