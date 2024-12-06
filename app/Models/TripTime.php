<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripTime extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'start_time', 'end_time'];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
