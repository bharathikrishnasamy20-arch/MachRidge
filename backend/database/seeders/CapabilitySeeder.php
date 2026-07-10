<?php

namespace Database\Seeders;

use App\Models\Capability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapabilitySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Capability::create([
            'title' => 'CNC Turning',
            'slug' => 'cnc-turning',
            'description' => 'Our CNC turning department is equipped with state-of-the-art lathes and turning centers capable of handling parts up to 600mm in diameter and 2000mm in length. We offer both horizontal and vertical turning capabilities with live tooling for complex multi-operation parts. Our machines are equipped with bar feeders for high-volume production and C/Y-axis capabilities for intricate geometries.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-sync-alt',
            'status' => true,
            'order' => 1,
        ]);

        Capability::create([
            'title' => 'CNC Milling',
            'slug' => 'cnc-milling',
            'description' => 'Our CNC milling capability spans 3-axis, 4-axis, and full 5-axis machining centers with work envelopes up to 2000mm x 1000mm x 800mm. We handle complex contouring, multi-face machining, and tight-tolerance pocketing operations. Our advanced CAM programming ensures optimal tool paths for superior surface finishes and reduced cycle times.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-cogs',
            'status' => true,
            'order' => 2,
        ]);

        Capability::create([
            'title' => 'Precision Grinding',
            'slug' => 'precision-grinding',
            'description' => 'Our precision grinding department offers surface grinding, cylindrical grinding, centerless grinding, and jig grinding services. We achieve tolerances as tight as +/- 0.002mm with surface finishes down to Ra 0.05μm. Our grinding capabilities are essential for applications requiring exceptional dimensional accuracy and superior surface quality.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'icon' => 'fas fa-compress-alt',
            'status' => true,
            'order' => 3,
        ]);

        Capability::create([
            'title' => 'Wire EDM',
            'slug' => 'wire-edm',
            'description' => 'Our wire EDM (Electrical Discharge Machining) capability enables the production of complex shapes and contours in hardened materials that would be impossible with conventional machining. We utilize 5-axis wire EDM machines capable of cutting intricate profiles with tolerances of +/- 0.002mm and exceptional surface finishes.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-bolt',
            'status' => true,
            'order' => 4,
        ]);

        Capability::create([
            'title' => 'Metal Fabrication & Welding',
            'slug' => 'metal-fabrication-welding',
            'description' => 'Our metal fabrication department is equipped with laser cutting, plasma cutting, press braking, and robotic welding systems. We work with materials from thin gauge sheet metal to heavy plate steel, producing welded assemblies, frames, enclosures, and structural components. Our certified welders are qualified for AWS D1.1 structural and ASME Section IX pressure vessel standards.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-fire',
            'status' => true,
            'order' => 5,
        ]);

        Capability::create([
            'title' => 'Quality Inspection & Metrology',
            'slug' => 'quality-inspection-metrology',
            'description' => 'Our quality inspection department is staffed with skilled metrology technicians and equipped with advanced inspection equipment including CMMs, vision systems, surface roughness testers, and hardness testers. We provide full dimensional inspection, first article inspection (FAI), PPAP documentation, and statistical process control (SPC) reporting.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-search',
            'status' => true,
            'order' => 6,
        ]);
    }
}
