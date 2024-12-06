<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\TripTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripTimeFactory extends Factory
{
    protected $model = TripTime::class;

    public function definition()
    {
        $startTime = $this->faker->dateTimeBetween('-1 week', 'now');
        $endTime = $this->faker->dateTimeBetween($startTime, '+2 days');

        return [
            'car_id' => Car::query()->inRandomOrder()->value('id')
                ?? Car::factory()->create()->id,
            'user_id' => User::query()->inRandomOrder()->value('id')
                ?? User::factory()->create()->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
