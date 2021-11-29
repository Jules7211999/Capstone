<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetimezone',
        'month_name',
        'day_of_week',
        'user_id',
        'activity'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
