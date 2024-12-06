<?php

namespace Database\Factories;

use App\Models\CarCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarCategoryFactory extends Factory
{
    protected $model = CarCategory::class;

    private static $names = ['First', 'Second', 'Third', 'Business', 'Premium'];
    private static $index = 0;

    public function definition()
    {
        $name = self::$names[self::$index];
        // Увеличиваем индекс для следующего элемента
        self::$index = (self::$index + 1) % count(self::$names);

        return [
            'name' => $name,
        ];
    }
}
