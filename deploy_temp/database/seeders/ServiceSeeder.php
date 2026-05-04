<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['name' => 'Residential Deep Clean', 'description' => 'Complete home cleaning including all rooms'],
            ['name' => 'Office Commercial Clean', 'description' => 'Professional workspace sanitization'],
            ['name' => 'Pressure Washing', 'description' => '150 Bar Greenworks power washing'],
            ['name' => 'Carpet & Upholstery', 'description' => 'Deep extraction cleaning'],
            ['name' => 'Post-Construction Cleaning', 'description' => 'Remove dust and debris after renovation'],
            ['name' => 'Move In / Move Out Cleaning', 'description' => 'Complete empty property cleaning'],
            ['name' => 'Industrial Equipment Cleaning', 'description' => 'MUR-POWER HARYDRY vacuum system'],
            ['name' => 'Deodorizing Treatment', 'description' => 'Tineco deodorizing & cleaning solution'],
            ['name' => 'Electric Brush Detailing', 'description' => 'Inso 7IN1 precision cleaning brush'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
