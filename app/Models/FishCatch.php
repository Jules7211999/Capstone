<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FishCatch extends Model
{
    use HasFactory;

    protected $fillable= [
        'fish_id',
        'kilos',
        'barangay_id',
        'month_id',
        'year',
    ];

    public function barangay(){
        return $this->belongsTo(barang::class);
    }
    public function fish(){
        return $this->hasOne(fish::class,'id','fish_id');
    }

    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i');
    }
  

    
}
