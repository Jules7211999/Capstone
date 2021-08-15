<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinates extends Model
{

    protected $fillable = [
        
        'latitude',
        'longitude',
        'user_id'
    ];

    use HasFactory;
}
