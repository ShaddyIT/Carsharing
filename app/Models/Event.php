<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event'];
    
    public function car_events(){
        return $this->hasMany(CarEvent::class);
    }
}
