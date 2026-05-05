<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Update admin email
$user = User::where('email', 'admin@oriefls.com')->first();

if ($user) {
    $user->email = 'oyigbonkechi@gmail.com';
    $user->save();
    echo "✅ Admin email updated successfully!<br>";
    echo "New email: oyigbonkechi@gmail.com<br>";
    echo "Password remains: admin123<br>";
    echo "<br><strong>The admin can change the password later from the settings page.</strong>";
} else {
    echo "❌ Admin user not found!";
}