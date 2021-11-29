<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Months extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];

    public function catch(){
        return $this->hasMany(FishCatch::class,'month_id','id');
    }
    public function coordinates(){
        return $this->hasMany(Coordinates::class,'month_id','id');
    }

    public function history(){
        return  $this->hasMany(HistoryLog::class,'month_name','name');
    }
}
