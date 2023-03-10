<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function flet_of_cars(){
        return $this->hasMany(FletOfCar::class);
    }
}
