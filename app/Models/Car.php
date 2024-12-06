<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'category_id', 'driver_id'];

    public function category()
    {
        return $this->belongsTo(CarCategory::class, 'category_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function trips()
    {
        return $this->hasMany(TripTime::class, 'car_id');
    }
}
