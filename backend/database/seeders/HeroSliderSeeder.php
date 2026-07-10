<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        HeroSlider::create([
            'title' => 'Precision CNC Machining Services',
            'subtitle' => 'Your Trusted Partner in Manufacturing Excellence',
            'description' => 'State-of-the-art CNC machining capabilities delivering high-quality precision components for industries worldwide. From prototype to production, we deliver excellence in every part.',
            'btn_text' => 'Explore Capabilities',
            'btn_link' => '/capabilities',
            'btn2_text' => 'Request a Quote',
            'btn2_link' => '/request-quote',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920&q=85',
            'bg_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920&q=85',
            'overlay_opacity' => 0.55,
            'order' => 1,
            'status' => true,
        ]);

        HeroSlider::create([
            'title' => 'Advanced Manufacturing Solutions',
            'subtitle' => 'Innovation Driven by Precision Engineering',
            'description' => 'Leveraging cutting-edge technology and decades of expertise to deliver complex machined components that meet the most demanding specifications across multiple industries.',
            'btn_text' => 'View Products',
            'btn_link' => '/products',
            'btn2_text' => 'Contact Us',
            'btn2_link' => '/contact',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=1920&q=85',
            'bg_image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=1920&q=85',
            'overlay_opacity' => 0.6,
            'order' => 2,
            'status' => true,
        ]);

        HeroSlider::create([
            'title' => 'Quality Assurance You Can Trust',
            'subtitle' => 'ISO-Certified Precision Manufacturing',
            'description' => 'Our comprehensive quality management system ensures every component meets rigorous standards. With advanced inspection equipment and skilled technicians, we guarantee precision and reliability.',
            'btn_text' => 'Our Quality Process',
            'btn_link' => '/about',
            'btn2_text' => 'Get Started',
            'btn2_link' => '/request-quote',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1920&q=85',
            'bg_image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1920&q=85',
            'overlay_opacity' => 0.5,
            'order' => 3,
            'status' => true,
        ]);
    }
}
