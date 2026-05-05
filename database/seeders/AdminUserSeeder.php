<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'oyigbonkechi@gmail.com'],
            [
                'name' => 'Admin',
                'email' => 'oyigbonkechi@gmail.com',
                'password' => Hash::make('oyigbonkechi'),
                'role' => 'admin',
            ]
        );
        
        echo "Admin user created with email: oyigbonkechi@gmail.com\n";
    }
}