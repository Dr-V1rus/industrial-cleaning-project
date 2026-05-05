<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$kernel->call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);
$kernel->call('db:seed', ['--class' => 'ServiceSeeder', '--force' => true]);
$kernel->call('db:seed', ['--class' => 'SettingSeeder', '--force' => true]);

echo "✅ Seeding completed!<br>";
echo "Admin: oyigbonkechi@gmail.com / password";
