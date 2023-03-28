<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FleetOfCar extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;
    
    protected $fillable = ['car_model_id','state_number','vin_number','cost_per_minute','car_status'];

    public function scopeFree(Builder $query){
        return $query->where('car_status', '0');
    }

    public function scopeRent(Builder $query){
        return $query->where('car_status', '1');
    }


    
    public function car_model(){
        return $this->belongsTo(CarModel::class);
    }

    public function car_events(){
        return $this->hasMany(CarEvent::class);
    }

    public function user_rents(){
        return $this->hasMany(UserRent::class, 'car_id');
    }
}
