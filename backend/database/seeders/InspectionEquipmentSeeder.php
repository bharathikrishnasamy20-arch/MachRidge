<?php

namespace Database\Seeders;

use App\Models\InspectionEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InspectionEquipmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        InspectionEquipment::create([
            'name' => 'Zeiss CONTURA G2 CMM',
            'slug' => 'zeiss-contura-g2-cmm',
            'description' => 'Computer-controlled coordinate measuring machine with active scanning technology for high-precision dimensional inspection. Equipped with VAST XXT scanning probe for accurate measurement of complex geometries and free-form surfaces. Measurement range: 1200mm x 1000mm x 600mm with accuracy of 1.5μm.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'icon' => 'fas fa-microscope',
            'status' => true,
            'order' => 1,
        ]);

        InspectionEquipment::create([
            'name' => 'Keyence IM-8000 Vision System',
            'slug' => 'keyence-im-8000-vision-system',
            'description' => 'High-speed image dimension measurement system capable of measuring up to 100 dimensions simultaneously in seconds. Features a 20MP camera with telecentric lens for distortion-free measurements. Ideal for rapid inspection of turned and milled components with measurement accuracy of +/- 2μm.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-camera',
            'status' => true,
            'order' => 2,
        ]);

        InspectionEquipment::create([
            'name' => 'Mitutoyo Surftest SJ-410',
            'slug' => 'mitutoyo-surftest-sj-410',
            'description' => 'Surface roughness tester with a wide measurement range and high resolution. Capable of measuring Ra, Rz, Rmax, and numerous other surface finish parameters. Features a large color LCD touchscreen and built-in thermal printer for on-the-spot reporting.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-ruler',
            'status' => true,
            'order' => 3,
        ]);

        InspectionEquipment::create([
            'name' => 'Mitutoyo BH-506 CMM',
            'slug' => 'mitutoyo-bh-506-cmm',
            'description' => 'Bridge-type coordinate measuring machine with Renishaw PH10M motorized probe head for automated inspection routines. Features a granite base for thermal stability and air bearings for friction-free movement. Measurement range: 500mm x 600mm x 500mm.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-chart-line',
            'status' => true,
            'order' => 4,
        ]);

        InspectionEquipment::create([
            'name' => 'Mahr MarForm MMQ 400',
            'slug' => 'mahr-marform-mmq-400',
            'description' => 'Form measurement system for roundness, cylindricity, and straightness measurement. Features a high-precision rotating table with accuracy of 0.02μm and a motorized vertical column for automated scanning. Essential for inspection of precision shafts, bearing journals, and hydraulic components.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-circle',
            'status' => true,
            'order' => 5,
        ]);

        InspectionEquipment::create([
            'name' => 'Wilson Rockwell Hardness Tester',
            'slug' => 'wilson-rockwell-hardness-tester',
            'description' => 'Digital Rockwell hardness tester with automatic load application and depth measurement. Capable of testing in all Rockwell scales (A, B, C, etc.) with direct digital readout. Features a motorized test cycle and RS-232 data output for documentation.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-weight-hanging',
            'status' => true,
            'order' => 6,
        ]);

        InspectionEquipment::create([
            'name' => 'Olympus SZX16 Stereo Microscope',
            'slug' => 'olympus-szx16-stereo-microscope',
            'description' => 'High-magnification stereo zoom microscope with 0.7x to 11.5x zoom range (effective magnification up to 115x). Equipped with a 20MP digital camera for image capture and measurement. Essential for visual inspection of surface defects, edge conditions, and micro-features.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'icon' => 'fas fa-search-plus',
            'status' => true,
            'order' => 7,
        ]);

        InspectionEquipment::create([
            'name' => 'FaroArm Quantum 8-Axis',
            'slug' => 'faroarm-quantum-8-axis',
            'description' => 'Portable 8-axis articulated arm coordinate measuring machine with laser line probe capability. Offers unlimited measurement volume through mobility and 3D scanning capabilities. Ideal for on-machine inspection, large part verification, and reverse engineering applications.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-robot',
            'status' => true,
            'order' => 8,
        ]);

        InspectionEquipment::create([
            'name' => 'Leica DVM6 Digital Microscope',
            'slug' => 'leica-dvm6-digital-microscope',
            'description' => 'High-performance digital microscope with 16:1 zoom range (35x to 350x optical, up to 2350x digital). Features automated focus, contrast, and brightness adjustment. Includes comprehensive measurement and reporting software for detailed surface analysis.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'icon' => 'fas fa-eye',
            'status' => true,
            'order' => 9,
        ]);

        InspectionEquipment::create([
            'name' => 'Sheffield Spectre Gage System',
            'slug' => 'sheffield-spectre-gage-system',
            'description' => 'Automated dimensional gaging system for high-volume production inspection. Uses air-electric probes and LVDT sensors for precise measurement of internal diameters, external diameters, taper, and roundness. Ideal for in-process SPC monitoring of production runs.',
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'icon' => 'fas fa-tachometer-alt',
            'status' => true,
            'order' => 10,
        ]);

        InspectionEquipment::create([
            'name' => 'Zygo ZeGage Plus 3D Profiler',
            'slug' => 'zygo-zegage-plus-3d-profiler',
            'description' => 'Non-contact optical 3D surface profiler using white light interferometry for sub-nanometer surface measurement. Capable of measuring surface roughness, step heights, and 3D topography with 0.1nm vertical resolution. Essential for precision optical and medical component inspection.',
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'icon' => 'fas fa-sun',
            'status' => true,
            'order' => 11,
        ]);

        InspectionEquipment::create([
            'name' => 'Instron 5960 Universal Tester',
            'slug' => 'instron-5960-universal-tester',
            'description' => 'Electromechanical universal testing machine for tensile, compression, flexural, and peel testing. Equipped with 50kN load cell and Bluehill 3 software for comprehensive mechanical property analysis. Features a wide range of grips and fixtures for various specimen types and test standards.',
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'icon' => 'fas fa-dumbbell',
            'status' => true,
            'order' => 12,
        ]);
    }
}
