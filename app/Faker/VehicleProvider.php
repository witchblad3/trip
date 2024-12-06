<?php

namespace App\Faker;

use Faker\Provider\Base;

class VehicleProvider extends Base
{
    // Массив автомобилей
    protected static $vehicles = [
        'Toyota Camry', 'Ford Focus', 'Honda Accord', 'Chevrolet Malibu', 'BMW 3 Series',
        'Audi A4', 'Mercedes-Benz C-Class', 'Hyundai Sonata', 'Kia Optima', 'Mazda 6'
    ];

    // Индекс для отслеживания текущего автомобиля
    protected static $currentIndex = 0;

    public static function vehicle()
    {
        if (self::$currentIndex >= count(self::$vehicles)) {
            self::$currentIndex = 0;
        }

        $vehicle = self::$vehicles[self::$currentIndex];
        self::$currentIndex++;

        return $vehicle;
    }
}
