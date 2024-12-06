<?php

namespace Database\Factories;

use App\Models\CategoryPosition;
use App\Models\UserPosition;
use App\Models\CarCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'position_id' => UserPosition::query()->inRandomOrder()->value('id'),
            'category_id' => CarCategory::query()->inRandomOrder()->value('id')
        ];
    }

}
