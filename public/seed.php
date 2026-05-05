<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Running migrations...<br>";
$kernel->call('migrate', ['--force' => true]);

echo "Running seeders...<br>";
$kernel->call('db:seed', ['--force' => true]);

echo "<h1>✅ Database seeded successfully!</h1>";
echo "<p>Admin: oyigbonkechi@gmail.com</p>";
echo "<p>Password: password</p>";