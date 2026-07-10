<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Testimonial::create([
            'name' => 'James Mitchell',
            'designation' => 'Procurement Manager',
            'company' => 'AeroDynamics Corp',
            'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=85',
            'content' => 'MachRidge Industries has been our primary precision machining partner for over five years. Their consistent quality, on-time delivery, and willingness to tackle complex engineering challenges make them an invaluable part of our supply chain. The AS9100 certification gives us confidence in their aerospace manufacturing capabilities.',
            'rating' => 5,
            'status' => true,
        ]);

        Testimonial::create([
            'name' => 'Sarah Chen',
            'designation' => 'Senior Engineer',
            'company' => 'Precision Auto Parts Ltd',
            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&q=85',
            'content' => 'We approached MachRidge with a complex transmission component that several other shops had rejected. Their engineering team redesigned the manufacturing process, reducing our costs by 30% while improving dimensional consistency. Their IATF 16949 quality system and PPAP documentation exceeded our requirements.',
            'rating' => 5,
            'status' => true,
        ]);

        Testimonial::create([
            'name' => 'Robert Patel',
            'designation' => 'VP of Operations',
            'company' => 'MedTech Innovations',
            'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&q=85',
            'content' => 'The ISO 13485 certified cleanroom facility at MachRidge Industries allowed us to bring our medical device manufacturing in-house with confidence. Their attention to detail, material traceability, and validation documentation have made our regulatory audits much smoother. Highly recommended for medical component manufacturing.',
            'rating' => 5,
            'status' => true,
        ]);

        Testimonial::create([
            'name' => 'Maria Gonzalez',
            'designation' => 'Supply Chain Director',
            'company' => 'GulfStream Energy',
            'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&q=85',
            'content' => 'MachRidge has been handling our critical valve components for offshore applications for three years now. Their expertise with corrosion-resistant alloys and API standards is exceptional. They have consistently delivered on tight deadlines and have been proactive in suggesting design improvements that enhanced our product reliability.',
            'rating' => 5,
            'status' => true,
        ]);
    }
}
