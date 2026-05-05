<?php

// Correct path to the vendor folder (one level up from public)
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$kernel->call('migrate', [
    '--force' => true,
]);

echo "✅ Migration completed successfully!";