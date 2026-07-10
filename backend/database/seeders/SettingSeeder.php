<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Company Information
        Setting::create(['key' => 'company_name', 'value' => 'MachRidge Industries', 'group' => 'company', 'type' => 'text']);
        Setting::create(['key' => 'company_tagline', 'value' => 'Precision Manufacturing Excellence', 'group' => 'company', 'type' => 'text']);
        Setting::create(['key' => 'company_email', 'value' => 'info@machridge.com', 'group' => 'company', 'type' => 'text']);
        Setting::create(['key' => 'company_phone', 'value' => '+1 (555) 123-4567', 'group' => 'company', 'type' => 'text']);
        Setting::create(['key' => 'company_address', 'value' => '4500 Industrial Parkway, Building 12, Cleveland, OH 44101', 'group' => 'company', 'type' => 'textarea']);
        Setting::create(['key' => 'company_description', 'value' => 'MachRidge Industries is a leading precision manufacturing company specializing in CNC machining, precision engineering, and custom component manufacturing. With over 25 years of experience, we serve the automotive, aerospace, medical, oil & gas, and industrial machinery sectors with high-quality machined components.', 'group' => 'company', 'type' => 'textarea']);

        // SEO Settings
        Setting::create(['key' => 'meta_title', 'value' => 'MachRidge Industries | Precision CNC Machining & Manufacturing', 'group' => 'seo', 'type' => 'text']);
        Setting::create(['key' => 'meta_description', 'value' => 'MachRidge Industries is a leading precision manufacturing company offering CNC machining, precision engineering, and custom component manufacturing for automotive, aerospace, medical, and industrial applications.', 'group' => 'seo', 'type' => 'textarea']);
        Setting::create(['key' => 'meta_keywords', 'value' => 'CNC machining, precision manufacturing, machined components, CNC turning, CNC milling, aerospace machining, automotive parts, medical device manufacturing, industrial components', 'group' => 'seo', 'type' => 'text']);

        // Social Media Links
        Setting::create(['key' => 'social_linkedin', 'value' => 'https://www.linkedin.com/company/machridge-industries', 'group' => 'social', 'type' => 'url']);
        Setting::create(['key' => 'social_facebook', 'value' => 'https://www.facebook.com/machridgeindustries', 'group' => 'social', 'type' => 'url']);
        Setting::create(['key' => 'social_twitter', 'value' => 'https://twitter.com/machridge', 'group' => 'social', 'type' => 'url']);
        Setting::create(['key' => 'social_youtube', 'value' => 'https://www.youtube.com/@machridgeindustries', 'group' => 'social', 'type' => 'url']);
        Setting::create(['key' => 'social_instagram', 'value' => 'https://www.instagram.com/machridgeindustries', 'group' => 'social', 'type' => 'url']);

        // Contact Page Settings
        Setting::create(['key' => 'contact_form_email', 'value' => 'info@machridge.com', 'group' => 'contact', 'type' => 'text']);
        Setting::create(['key' => 'contact_map_latitude', 'value' => '41.4993', 'group' => 'contact', 'type' => 'text']);
        Setting::create(['key' => 'contact_map_longitude', 'value' => '-81.6944', 'group' => 'contact', 'type' => 'text']);
        Setting::create(['key' => 'business_hours', 'value' => 'Monday - Friday: 7:00 AM - 5:30 PM EST', 'group' => 'contact', 'type' => 'text']);

        // General Settings
        Setting::create(['key' => 'site_logo', 'value' => '/images/logo.png', 'group' => 'general', 'type' => 'text']);
        Setting::create(['key' => 'site_favicon', 'value' => '/images/favicon.ico', 'group' => 'general', 'type' => 'text']);
        Setting::create(['key' => 'footer_text', 'value' => '&copy; 2025 MachRidge Industries. All rights reserved. Precision Manufacturing Excellence.', 'group' => 'general', 'type' => 'textarea']);
    }
}
