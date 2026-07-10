<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        ProductCategory::create([
            'name' => 'CNC Machined Components',
            'slug' => 'cnc-machined-components',
            'description' => 'High-precision CNC machined components manufactured using advanced multi-axis machining centers. Our CNC capabilities include turning, milling, drilling, and tapping operations on a wide range of materials including steel, aluminum, brass, titanium, and engineering plastics. Each component is produced to exact specifications with tight tolerances and superior surface finishes.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-cogs',
            'status' => true,
            'order' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Precision Engineering Parts',
            'slug' => 'precision-engineering-parts',
            'description' => 'Engineered precision parts designed and manufactured to meet the most demanding requirements. Our precision engineering division combines advanced CAD/CAM capabilities with skilled craftsmanship to produce complex components with exceptional accuracy and repeatability for critical applications.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-microchip',
            'status' => true,
            'order' => 2,
        ]);

        ProductCategory::create([
            'name' => 'Custom Manufactured Components',
            'slug' => 'custom-manufactured-components',
            'description' => 'Bespoke manufacturing solutions tailored to your specific requirements. From prototype development to full-scale production, we work closely with clients to design and manufacture custom components that solve unique engineering challenges and optimize performance.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'icon' => 'fas fa-tools',
            'status' => true,
            'order' => 3,
        ]);

        ProductCategory::create([
            'name' => 'Industrial Components',
            'slug' => 'industrial-components',
            'description' => 'Robust industrial components built for durability and reliability in demanding environments. Our industrial component range includes heavy-duty parts for manufacturing equipment, material handling systems, and processing machinery, all manufactured to withstand rigorous operational conditions.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-industry',
            'status' => true,
            'order' => 4,
        ]);
    }
}
