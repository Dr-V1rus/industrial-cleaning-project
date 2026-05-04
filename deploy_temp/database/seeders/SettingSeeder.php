<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // General settings
            ['key' => 'site_name', 'value' => "Oriefi's Clean", 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => '/images/logo.png', 'type' => 'image', 'group' => 'general'],
            ['key' => 'contact_phone', 'value' => '+234 803 206 8718', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@orieflsclean.com', 'type' => 'email', 'group' => 'contact'],
            ['key' => 'whatsapp_number', 'value' => '2348032068718', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => '#', 'type' => 'url', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => '#', 'type' => 'url', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => '#', 'type' => 'url', 'group' => 'social'],
            ['key' => 'tiktok_url', 'value' => '#', 'type' => 'url', 'group' => 'social'],
            
            // Hero settings
            ['key' => 'hero_title', 'value' => 'Professional Cleaning Services', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Industrial-grade equipment for spotless results', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'hero_images', 'value' => '["/images/hero1.jpg","/images/hero2.jpg","/images/hero3.jpg"]', 'type' => 'json', 'group' => 'hero'],
            
            // Stats
            ['key' => 'stats_clients', 'value' => '500', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'stats_jobs', 'value' => '1200', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'stats_staff', 'value' => '15', 'type' => 'number', 'group' => 'stats'],
            
            // Video URLs
            ['key' => 'video_1_url', 'value' => '/videos/cleaning_video1.mp4', 'type' => 'file', 'group' => 'videos'],
            ['key' => 'video_2_url', 'value' => '/videos/cleaning_video2.mp4', 'type' => 'file', 'group' => 'videos'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
