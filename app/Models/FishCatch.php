<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishCatch extends Model
{
    use HasFactory;

    protected $fillable= [
        'common_name',
        'local_name',
        'kilo',
        'barangay',
        'month',
        'year',
    ];
}
