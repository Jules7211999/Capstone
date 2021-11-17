<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmergencyCall extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'user_id',
        'latitude',
        'longitude',
        'message',
        'img',
        'datetimezone',
        'month_name',
        'day_of_week',
        'type',
        'status',
        'dtz_accepted',
        'dtz_finished'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
