<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@machridge.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user',
        ])->assignRole('user');

        $this->call([
            HeroSliderSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            CapabilitySeeder::class,
            InspectionEquipmentSeeder::class,
            IndustrySeeder::class,
            TestimonialSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
