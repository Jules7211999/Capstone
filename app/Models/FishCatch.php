<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishCatch extends Model
{
    use HasFactory;

    protected $fillable= [
        'fish_id',
        'kilo',
        'barangay_id',
        'month',
        'year',
    ];

    public function barangay(){
        return $this->belongsTo(barang::class);
    }
    public function fish(){
        return $this->hasOne(fish::class,'id','fish_id');
    }

    


  

    
}
