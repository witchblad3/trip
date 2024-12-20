<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = ['name', 'email', 'password', 'position_id'];

    public function position()
    {
        return $this->belongsTo(UserPosition::class, 'position_id');
    }
    public function allowed_categories()
    {
        return $this->belongsToMany(CarCategory::class, 'category_position', 'position_id', 'category_id');
    }

}
