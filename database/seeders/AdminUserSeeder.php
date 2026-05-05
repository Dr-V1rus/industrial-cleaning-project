<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // First, delete any existing user with this email
        User::where('email', 'oyigbonkechi@gmail.com')->delete();
        
        // Create fresh admin user
        User::create([
            'name' => 'Admin',
            'email' => 'oyigbonkechi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        $this->command->info('Admin user created: oyigbonkechi@gmail.com / password');
    }
}