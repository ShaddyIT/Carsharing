<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['car_brand'];

    public function car_models(){
        return $this->hasMany(CarModel::class);
    }
}
