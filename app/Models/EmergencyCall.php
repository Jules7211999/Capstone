<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyCall extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'latitude',
        'longitude',
        'message',
        'img',
        'datetimezone',
        'month_name',
        'day_of_week',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
