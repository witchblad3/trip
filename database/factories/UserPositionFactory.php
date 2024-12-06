<?php

namespace Database\Factories;

use App\Models\UserPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPositionFactory extends Factory
{
    protected $model = UserPosition::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
        ];
    }
}

