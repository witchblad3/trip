<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password123'),
            'position_id' => UserPosition::query()->inRandomOrder()->value('id')
        ?? UserPosition::factory()->create()->id,
        ];
    }
}

