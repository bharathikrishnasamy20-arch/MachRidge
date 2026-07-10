<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(6, true),
            'excerpt' => fake()->sentence(20),
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'author' => 'MachRidge Industries',
            'meta_title' => $title,
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => 'manufacturing, machining, industrial',
            'status' => true,
            'featured' => fake()->boolean(30),
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
