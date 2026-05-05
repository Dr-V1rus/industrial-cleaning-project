<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Delete ALL existing users
User::truncate();

// Create new admin user
User::create([
    'name' => 'Super Admin',
    'email' => 'admin@oriefls.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin',
]);

echo "✅ Old users deleted!<br>";
echo "✅ New admin user created:<br>";
echo "Email: admin@oriefls.com<br>";
echo "Password: admin123<br>";