<?php

namespace Database\Factories;

use App\Faker\VehicleProvider;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        $this->faker->addProvider(new VehicleProvider($this->faker));

        return [
            'model' => $this->faker->vehicle,
            'category_id' => CarCategory::query()->inRandomOrder()->value('id'),
            'driver_id' => Driver::query()->inRandomOrder()->value('id')
                ?? Driver::factory()->create()->id,
        ];
    }
}
