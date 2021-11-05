<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipal extends Model
{
    use HasFactory;

    protected $fillable = [
    'postal_code',
    'name',
    ,'status',
    ];
}
