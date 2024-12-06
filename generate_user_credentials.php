<?php

use App\Models\User;
use Illuminate\Support\Facades\File;

require 'vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$users = User::all();

$credentials = $users->map(function ($user) {
    return [
        'email' => $user->email,
        'password' => 'password123',
    ];
});


$csvPath = storage_path('user_credentials.csv');
$file = fopen($csvPath, 'w');
fputcsv($file, ['Email', 'Password']);

foreach ($credentials as $credential) {
    fputcsv($file, $credential);
}

fclose($file);

echo "Список логинов и паролей создан: {$csvPath}" . PHP_EOL;
