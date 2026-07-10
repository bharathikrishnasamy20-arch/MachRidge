<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Industry::create([
            'name' => 'Automotive',
            'slug' => 'automotive',
            'description' => 'We supply precision-machined components to major automotive OEMs and Tier 1 suppliers worldwide. Our automotive manufacturing capabilities include engine components, transmission parts, chassis components, and drivetrain elements. We are IATF 16949 certified and experienced in PPAP, FMEA, and SPC quality systems.',
            'image' => 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?w=800&q=85',
            'icon' => 'fas fa-car',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Aerospace',
            'slug' => 'aerospace',
            'description' => 'Our aerospace division is AS9100D certified and specializes in manufacturing critical flight components from aerospace-grade materials. We produce structural brackets, engine components, landing gear parts, and interior fittings. Our facility maintains full material traceability and complies with NADCAP requirements for special processes.',
            'image' => 'https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?w=800&q=85',
            'icon' => 'fas fa-plane',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Oil & Gas',
            'slug' => 'oil-gas',
            'description' => 'We manufacture components for upstream, midstream, and downstream oil and gas applications. Our capabilities include API 6A and 17D compliant components for wellhead equipment, valve parts, drilling tools, and pipeline components. We work extensively with corrosion-resistant alloys and maintain API Q1 quality management systems.',
            'image' => 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&q=85',
            'icon' => 'fas fa-oil-can',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Medical',
            'slug' => 'medical',
            'description' => 'Our medical manufacturing division is ISO 13485 certified and operates a dedicated cleanroom facility for medical device component production. We manufacture surgical instruments, implant components, diagnostic equipment parts, and drug delivery system components. All medical parts are produced with full traceability and regulatory documentation.',
            'image' => 'https://images.unsplash.com/photo-1559757175-5700dde675bc?w=800&q=85',
            'icon' => 'fas fa-stethoscope',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Defense & Military',
            'slug' => 'defense-military',
            'description' => 'We are a trusted supplier to defense contractors and military agencies, providing precision-machined components for weapons systems, vehicles, communications equipment, and naval applications. Our facility complies with ITAR regulations and maintains strict security protocols for classified projects.',
            'image' => 'https://images.unsplash.com/photo-1509021436665-8f07dbfb5c1d?w=800&q=85',
            'icon' => 'fas fa-shield-alt',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Renewable Energy',
            'slug' => 'renewable-energy',
            'description' => 'We manufacture precision components for the renewable energy sector including wind turbine parts, solar tracking system components, hydroelectric turbine elements, and geothermal system parts. Our components are designed for long-term reliability and resistance to harsh environmental conditions.',
            'image' => 'https://images.unsplash.com/photo-1466611653912-95081537e5b7?w=800&q=85',
            'icon' => 'fas fa-solar-panel',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Marine & Shipbuilding',
            'slug' => 'marine-shipbuilding',
            'description' => 'Our marine division supplies components for commercial vessels, naval ships, and offshore platforms. We manufacture propeller shafts, rudder components, valve parts, pump components, and structural elements from marine-grade materials with appropriate corrosion protection and classification society certifications.',
            'image' => 'https://images.unsplash.com/photo-1540946485063-a40da27545f8?w=800&q=85',
            'icon' => 'fas fa-ship',
            'status' => true,
        ]);

        Industry::create([
            'name' => 'Industrial Machinery',
            'slug' => 'industrial-machinery',
            'description' => 'We provide comprehensive machining services for industrial machinery manufacturers, producing components for machine tools, packaging equipment, printing presses, textile machinery, and material handling systems. Our team has extensive experience in manufacturing replacement parts and improving legacy designs through modern manufacturing techniques.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-industry',
            'status' => true,
        ]);
    }
}
