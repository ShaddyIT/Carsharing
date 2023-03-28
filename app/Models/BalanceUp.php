<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BalanceUp extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;
    use Filterable;

    protected $fillable = ['user_id','date','money'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
