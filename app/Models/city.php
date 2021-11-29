<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'status',
        'zipcode'
    ];

   public function barang(){
       return $this->hasMany(barang::class);
   }
}