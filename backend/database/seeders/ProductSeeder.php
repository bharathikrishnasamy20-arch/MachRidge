<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = ProductCategory::all()->keyBy('slug');

        Product::create([
            'name' => 'CNC Milled Aluminum Housings',
            'slug' => 'cnc-milled-aluminum-housings',
            'description' => 'Precision-machined aluminum housings manufactured on 5-axis CNC machining centers. Features include tight tolerance bores, threaded holes, precision-machined surfaces, and complex internal cavities. Suitable for electronics enclosures, gearboxes, pump housings, and structural components requiring lightweight strength and corrosion resistance.',
            'short_description' => 'High-precision 5-axis machined aluminum housings with tight tolerances and superior surface finish for demanding applications.',
            'category_id' => $categories['cnc-machined-components']->id,
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '6061-T6 Aluminum / 7075-T6 Aluminum'],
                ['label' => 'Tolerance', 'value' => '+/- 0.005mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.4μm'],
                ['label' => 'Max Part Size', 'value' => '1200mm x 800mm x 600mm'],
                ['label' => 'Process', 'value' => '5-Axis CNC Milling'],
            ]),
            'applications' => 'Automotive transmission housings, aerospace avionics enclosures, industrial pump housings, medical device casings, robotics structural components.',
            'industries_served' => 'Automotive, Aerospace, Industrial, Medical, Robotics',
            'meta_title' => 'CNC Milled Aluminum Housings | Precision Machining',
            'meta_description' => 'High-precision CNC milled aluminum housings manufactured with 5-axis machining centers. Tight tolerances, excellent surface finish, and rapid turnaround.',
            'meta_keywords' => 'CNC milling, aluminum housings, precision machining, 5-axis machining, machined enclosures',
            'status' => true,
            'featured' => true,
            'order' => 1,
        ]);

        Product::create([
            'name' => 'Stainless Steel Precision Shafts',
            'slug' => 'stainless-steel-precision-shafts',
            'description' => 'Ground and polished stainless steel shafts manufactured to exacting specifications. Our precision shafts feature exceptional straightness, concentricity, and surface finish. Manufactured using CNC turning and centerless grinding processes, these shafts are ideal for linear motion systems, rotary applications, and precision mechanical assemblies.',
            'short_description' => 'Precision ground stainless steel shafts with exceptional straightness and surface finish for motion control applications.',
            'category_id' => $categories['cnc-machined-components']->id,
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '304 / 316 / 17-4PH Stainless Steel'],
                ['label' => 'Diameter Tolerance', 'value' => 'h6 / g6 / f7'],
                ['label' => 'Straightness', 'value' => '0.01mm per 300mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.2μm'],
                ['label' => 'Hardness', 'value' => 'HRC 28-32 (optional case hardening)'],
            ]),
            'applications' => 'Linear guide rails, hydraulic piston rods, printer rollers, conveyor systems, precision spindles, medical instruments.',
            'industries_served' => 'Automotive, Industrial, Medical, Printing, Packaging',
            'meta_title' => 'Precision Stainless Steel Shafts | Ground & Polished',
            'meta_description' => 'High-precision ground stainless steel shafts with superior straightness and surface finish. Ideal for linear motion and precision mechanical assemblies.',
            'meta_keywords' => 'precision shafts, stainless steel shafts, ground shafts, centerless grinding, linear motion',
            'status' => true,
            'featured' => true,
            'order' => 2,
        ]);

        Product::create([
            'name' => 'CNC Turned Brass Fittings',
            'slug' => 'cnc-turned-brass-fittings',
            'description' => 'Precision CNC turned brass fittings manufactured from high-grade brass alloys. Our fittings feature consistent thread forms, smooth internal passages, and excellent sealing surfaces. Available in a wide range of configurations including elbows, tees, couplings, adapters, and custom designs for pneumatic, hydraulic, and fluid handling systems.',
            'short_description' => 'High-quality CNC turned brass fittings with precision threads and excellent sealing for fluid and air systems.',
            'category_id' => $categories['cnc-machined-components']->id,
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => 'C36000 / C46400 / C26000 Brass'],
                ['label' => 'Thread Standard', 'value' => 'NPT / BSP / Metric'],
                ['label' => 'Tolerance', 'value' => '+/- 0.05mm'],
                ['label' => 'Pressure Rating', 'value' => 'Up to 3000 PSI'],
                ['label' => 'Finish', 'value' => 'Natural / Nickel Plated / Chrome Plated'],
            ]),
            'applications' => 'Pneumatic systems, hydraulic circuits, water treatment, gas distribution, instrumentation, refrigeration systems.',
            'industries_served' => 'Industrial, HVAC, Plumbing, Oil & Gas, Pneumatics',
            'meta_title' => 'CNC Turned Brass Fittings | Precision Fluid Components',
            'meta_description' => 'Precision CNC turned brass fittings with accurate threads and excellent sealing. Available in various configurations for pneumatic, hydraulic, and fluid systems.',
            'meta_keywords' => 'brass fittings, CNC turning, precision fittings, pneumatic fittings, hydraulic fittings',
            'status' => true,
            'featured' => false,
            'order' => 3,
        ]);

        Product::create([
            'name' => 'Titanium Aerospace Brackets',
            'slug' => 'titanium-aerospace-brackets',
            'description' => 'Lightweight high-strength titanium brackets machined for aerospace applications. Manufactured from Grade 5 (Ti-6Al-4V) titanium alloy, these brackets offer exceptional strength-to-weight ratio, corrosion resistance, and fatigue performance. Each bracket is produced with full traceability and meets AS9100 quality standards.',
            'short_description' => 'Lightweight aerospace-grade titanium brackets with exceptional strength and corrosion resistance for critical applications.',
            'category_id' => $categories['precision-engineering-parts']->id,
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => 'Ti-6Al-4V (Grade 5) Titanium'],
                ['label' => 'Tolerance', 'value' => '+/- 0.01mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.8μm'],
                ['label' => 'Weight Reduction', 'value' => 'Up to 40% vs steel equivalent'],
                ['label' => 'Certification', 'value' => 'AS9100 / Nadcap'],
            ]),
            'applications' => 'Aircraft structural brackets, engine mount components, satellite frame elements, helicopter transmission supports, UAV airframe parts.',
            'industries_served' => 'Aerospace, Defense, Space, UAV',
            'meta_title' => 'Titanium Aerospace Brackets | Precision Engineering',
            'meta_description' => 'AS9100-certified titanium aerospace brackets machined from Grade 5 titanium. Lightweight, high-strength components for critical aerospace applications.',
            'meta_keywords' => 'titanium brackets, aerospace machining, titanium parts, AS9100, precision aerospace components',
            'status' => true,
            'featured' => true,
            'order' => 4,
        ]);

        Product::create([
            'name' => 'High-Precision Gear Components',
            'slug' => 'high-precision-gear-components',
            'description' => 'Precision-engineered gear components manufactured using advanced gear cutting and grinding technologies. Our gears are produced to AGMA Class 12-15 quality levels with optimized tooth profiles for smooth operation, minimal noise, and maximum power transmission efficiency.',
            'short_description' => 'High-precision gears manufactured to AGMA Class 12-15 standards for demanding power transmission applications.',
            'category_id' => $categories['precision-engineering-parts']->id,
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '8620 / 4140 / 4340 Steel, Bronze, Nylon'],
                ['label' => 'AGMA Class', 'value' => '12-15'],
                ['label' => 'Module Range', 'value' => '0.5 - 12'],
                ['label' => 'Max Diameter', 'value' => '1500mm'],
                ['label' => 'Heat Treatment', 'value' => 'Carburizing / Nitriding / Induction Hardening'],
            ]),
            'applications' => 'Industrial gearboxes, automotive transmissions, wind turbine drives, marine propulsion systems, robotics joint drives.',
            'industries_served' => 'Automotive, Industrial, Renewable Energy, Marine, Robotics',
            'meta_title' => 'High-Precision Gear Components | AGMA Class 12-15',
            'meta_description' => 'Precision gear components manufactured to AGMA Class 12-15 quality levels. Advanced gear cutting and grinding for optimal power transmission.',
            'meta_keywords' => 'precision gears, gear manufacturing, AGMA class 12, gear grinding, power transmission',
            'status' => true,
            'featured' => false,
            'order' => 5,
        ]);

        Product::create([
            'name' => 'Medical Device Machined Parts',
            'slug' => 'medical-device-machined-parts',
            'description' => 'ISO 13485-certified precision machined components for medical devices and surgical instruments. Manufactured in a cleanroom environment using medical-grade stainless steels, titanium alloys, and PEEK polymers. Each part is produced with full documentation and traceability for regulatory compliance.',
            'short_description' => 'ISO 13485-certified precision machined components for medical devices with full traceability and cleanroom manufacturing.',
            'category_id' => $categories['precision-engineering-parts']->id,
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '316L SS / Ti-6Al-4V / PEEK / Nitinol'],
                ['label' => 'Tolerance', 'value' => '+/- 0.002mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.1μm (Electropolished)'],
                ['label' => 'Cleanroom', 'value' => 'ISO Class 7 (Class 10,000)'],
                ['label' => 'Standard', 'value' => 'ISO 13485 / FDA 21 CFR 820'],
            ]),
            'applications' => 'Surgical instruments, implant components, diagnostic equipment parts, drug delivery systems, orthopedic tools, dental implants.',
            'industries_served' => 'Medical, Dental, Pharmaceutical, Biotechnology',
            'meta_title' => 'Medical Device Machined Parts | ISO 13485 Precision Components',
            'meta_description' => 'ISO 13485-certified precision machined medical device components manufactured in cleanroom environments with full traceability.',
            'meta_keywords' => 'medical machining, surgical instruments, ISO 13485, cleanroom manufacturing, medical device components',
            'status' => true,
            'featured' => true,
            'order' => 6,
        ]);

        Product::create([
            'name' => 'Custom Hydraulic Manifold Blocks',
            'slug' => 'custom-hydraulic-manifold-blocks',
            'description' => 'Designed and manufactured custom hydraulic manifold blocks that consolidate multiple hydraulic functions into a single precision-machined component. Our manifolds reduce leakage points, simplify installation, and improve system reliability. Manufactured from high-strength aluminum or steel with complex internal drilling and porting.',
            'short_description' => 'Custom hydraulic manifold blocks consolidating multiple functions into a single precision-machined component for improved reliability.',
            'category_id' => $categories['custom-manufactured-components']->id,
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '6061-T6 Al / 1018 Steel / 4140 Alloy'],
                ['label' => 'Pressure Rating', 'value' => 'Up to 5000 PSI'],
                ['label' => 'Port Sizes', 'value' => 'SAE / NPT / BSP / Metric'],
                ['label' => 'Internal Passages', 'value' => 'Cross-drilled / Gun-drilled / EDM'],
                ['label' => 'Surface Treatment', 'value' => 'Anodizing / Zinc Plating / Chem Film'],
            ]),
            'applications' => 'Mobile hydraulic systems, industrial hydraulic power units, injection molding machines, construction equipment, agricultural machinery.',
            'industries_served' => 'Industrial, Construction, Agriculture, Mining, Marine',
            'meta_title' => 'Custom Hydraulic Manifold Blocks | Precision Manufacturing',
            'meta_description' => 'Custom-designed hydraulic manifold blocks precision-machined to consolidate functions, reduce leakage, and improve system reliability.',
            'meta_keywords' => 'hydraulic manifolds, custom manifolds, manifold blocks, hydraulic systems, precision machining',
            'status' => true,
            'featured' => false,
            'order' => 7,
        ]);

        Product::create([
            'name' => 'Prototype to Production Components',
            'slug' => 'prototype-to-production-components',
            'description' => 'End-to-end manufacturing service from rapid prototyping to full-scale production. We work with clients to refine designs, select optimal materials, and develop efficient manufacturing processes. Our agile approach reduces time-to-market while maintaining the highest quality standards throughout the production lifecycle.',
            'short_description' => 'Complete manufacturing service from rapid prototyping through full-scale production with design optimization and process development.',
            'category_id' => $categories['custom-manufactured-components']->id,
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Service', 'value' => 'Design Review / DFM / Prototyping / Production'],
                ['label' => 'Lead Time', 'value' => 'Prototypes: 2-5 days / Production: 2-6 weeks'],
                ['label' => 'Materials', 'value' => 'All metals, plastics, composites'],
                ['label' => 'Volume', 'value' => '1 - 100,000+ units'],
                ['label' => 'Quality', 'value' => 'FAI / PPAP / CMM Inspection'],
            ]),
            'applications' => 'New product development, design validation, market testing components, production ramp-up, legacy part reproduction.',
            'industries_served' => 'All Industries',
            'meta_title' => 'Prototype to Production | Custom Manufacturing Services',
            'meta_description' => 'End-to-end manufacturing from rapid prototyping to full-scale production. Design optimization, material selection, and process development services.',
            'meta_keywords' => 'prototype manufacturing, production machining, custom manufacturing, DFM, rapid prototyping',
            'status' => true,
            'featured' => true,
            'order' => 8,
        ]);

        Product::create([
            'name' => 'Heavy Equipment Wear Parts',
            'slug' => 'heavy-equipment-wear-parts',
            'description' => 'Durable wear-resistant components manufactured for heavy equipment used in mining, construction, and material handling. These parts are engineered from abrasion-resistant steels and treated with advanced hardening processes to maximize service life in extreme operating conditions.',
            'short_description' => 'Abrasion-resistant wear parts for heavy equipment manufactured from hardened steels for maximum durability in extreme conditions.',
            'category_id' => $categories['industrial-components']->id,
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => 'AR400 / AR500 / Hardox / Manganese Steel'],
                ['label' => 'Hardness', 'value' => 'HB 400-600'],
                ['label' => 'Process', 'value' => 'Plasma / Laser Cutting, CNC Machining, Welding'],
                ['label' => 'Thickness', 'value' => '6mm - 150mm'],
                ['label' => 'Treatment', 'value' => 'Through-Hardened / Quench & Tempered'],
            ]),
            'applications' => 'Excavator buckets, crusher liners, conveyor wear strips, dump truck liners, shovel teeth adapters, screening media.',
            'industries_served' => 'Mining, Construction, Quarrying, Recycling, Forestry',
            'meta_title' => 'Heavy Equipment Wear Parts | Abrasion-Resistant Components',
            'meta_description' => 'Durable wear-resistant components for heavy equipment. Manufactured from AR400, AR500, and manganese steels for extreme durability.',
            'meta_keywords' => 'wear parts, heavy equipment, abrasion resistant, AR400, mining components, crusher parts',
            'status' => true,
            'featured' => false,
            'order' => 9,
        ]);

        Product::create([
            'name' => 'Industrial Roller Assemblies',
            'slug' => 'industrial-roller-assemblies',
            'description' => 'Precision-engineered industrial roller assemblies designed for material handling systems, conveyor lines, and processing equipment. Each roller assembly is manufactured with precision bearings, balanced rotating components, and durable outer shells to ensure smooth operation and long service life.',
            'short_description' => 'Precision-engineered industrial roller assemblies for material handling and conveyor systems with durable construction.',
            'category_id' => $categories['industrial-components']->id,
            'image' => 'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1565043666747-69f6646b9402?w=800&q=85',
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => 'Steel / Stainless / UHMW / Rubber Coated'],
                ['label' => 'Diameter', 'value' => '25mm - 500mm'],
                ['label' => 'Bearing Type', 'value' => 'Ball / Roller / Spherical / Tapered'],
                ['label' => 'Load Capacity', 'value' => 'Up to 50,000 lbs'],
                ['label' => 'Surface', 'value' => 'Ground / Polished / Textured / Coated'],
            ]),
            'applications' => 'Belt conveyors, roller conveyors, printing presses, steel mill rollers, paper processing, packaging lines, food processing.',
            'industries_served' => 'Industrial, Packaging, Food & Beverage, Steel, Printing, Logistics',
            'meta_title' => 'Industrial Roller Assemblies | Precision Conveyor Components',
            'meta_description' => 'Precision-engineered industrial roller assemblies for conveyors and material handling. Custom designs available for any application.',
            'meta_keywords' => 'industrial rollers, conveyor rollers, roller assemblies, material handling, precision rollers',
            'status' => true,
            'featured' => false,
            'order' => 10,
        ]);

        Product::create([
            'name' => 'Pump and Valve Components',
            'slug' => 'pump-and-valve-components',
            'description' => 'Precision-machined components for pumps and valves including impellers, casings, stems, seats, discs, and bodies. Manufactured from corrosion-resistant alloys and engineered to provide reliable sealing, efficient fluid flow, and long service life in demanding process environments.',
            'short_description' => 'Precision-machined pump and valve components manufactured from corrosion-resistant alloys for reliable fluid handling.',
            'category_id' => $categories['industrial-components']->id,
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=85',
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => '316 / 317 / Duplex SS, Hastelloy, Inconel'],
                ['label' => 'Tolerance', 'value' => '+/- 0.01mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.4μm (Hydraulic passages)'],
                ['label' => 'Pressure Class', 'value' => '150# - 2500#'],
                ['label' => 'Standards', 'value' => 'API 610 / ISO 5199 / ASME B16.34'],
            ]),
            'applications' => 'Centrifugal pumps, positive displacement pumps, gate valves, ball valves, control valves, check valves, safety relief valves.',
            'industries_served' => 'Oil & Gas, Chemical, Water Treatment, Power Generation, Pharmaceutical',
            'meta_title' => 'Pump and Valve Components | Precision Machined Parts',
            'meta_description' => 'Precision-machined pump and valve components from corrosion-resistant alloys. Impellers, casings, stems, seats manufactured to industry standards.',
            'meta_keywords' => 'pump components, valve parts, impellers, valve stems, API 610, precision machining',
            'status' => true,
            'featured' => false,
            'order' => 11,
        ]);

        Product::create([
            'name' => 'Automotive Engine Components',
            'slug' => 'automotive-engine-components',
            'description' => 'High-performance automotive engine components manufactured for OEM and aftermarket applications. Our engine parts are produced from premium materials with precision machining processes that ensure optimal fit, performance, and reliability. Each component undergoes rigorous inspection to meet or exceed OEM specifications.',
            'short_description' => 'High-performance automotive engine components manufactured from premium materials with precision tolerances for OEM and aftermarket use.',
            'category_id' => $categories['industrial-components']->id,
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
            'gallery' => json_encode([
                'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=85',
                'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=85',
            ]),
            'specifications' => json_encode([
                ['label' => 'Material', 'value' => 'Forged Steel / Aluminum / Ductile Iron'],
                ['label' => 'Tolerance', 'value' => '+/- 0.005mm'],
                ['label' => 'Surface Finish', 'value' => 'Ra 0.2μm (Bearing surfaces)'],
                ['label' => 'Hardness', 'value' => 'HRC 58-62 (Cam lobes)'],
                ['label' => 'Process', 'value' => 'CNC Turning / Milling / Grinding / Honing'],
            ]),
            'applications' => 'Engine blocks, cylinder heads, crankshafts, connecting rods, pistons, camshafts, valve train components, oil pumps.',
            'industries_served' => 'Automotive, Motorsports, Heavy Truck, Marine, Powersports',
            'meta_title' => 'Automotive Engine Components | Precision Machined Parts',
            'meta_description' => 'High-precision automotive engine components for OEM and aftermarket. Premium materials, tight tolerances, and rigorous quality inspection.',
            'meta_keywords' => 'engine components, automotive machining, crankshafts, connecting rods, performance engine parts',
            'status' => true,
            'featured' => true,
            'order' => 12,
        ]);
    }
}
