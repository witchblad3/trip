<?php

namespace Database\Seeders;

use App\Models\CategoryPosition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\UserPosition::factory(10)->create();
        \App\Models\User::factory(50)->create();
        \App\Models\CarCategory::factory(5)->create();
        \App\Models\CategoryPosition::factory(30)->create();
        \App\Models\Driver::factory(20)->create();
        \App\Models\Car::factory(10)->create();
        \App\Models\TripTime::factory(50)->create();
    }
}

