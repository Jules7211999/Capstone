<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Months extends Model
{
    use HasFactory;


    public function catch(){
        return $this->hasMany(FishCatch::class,'month','id');
    }
}
