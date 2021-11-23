<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinates extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'latitude',
        'longitude',
        'user_id',
        'datetimezone',
        'month_name',
        'day_of_week',
        'month_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function months(){
        return $this->belongsTo(Months::class);
    }


    
}
