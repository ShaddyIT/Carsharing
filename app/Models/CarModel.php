<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['car_brand_id', 'car_model', 'steering_wheel_layout', 'type_of_gearbox', 'car_class'];

    public function car_brand(){
        return $this->belongsTo(CarBrand::class);
    }

    public function flet_of_cars(){
        return $this->hasMany(FleetOfCar::class);
    }
}
