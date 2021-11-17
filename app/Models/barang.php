<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;


    protected $fillable =[
        'name',
        'status',
        'city_id'
    ];

    public function city(){
        return $this->belongsTo(city::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function catch(){
       return $this->hasMany(FishCatch::class,'barangay_id','id');
    }
  
}
