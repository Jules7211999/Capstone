<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $fillable = [
        'phylum',
        'subphylum',
        'superclass',
        'class',
        'common_name',
        'local_name',
    ];
}
