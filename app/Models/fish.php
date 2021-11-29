<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fish extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'phylum',
        'subphylum',
        'superclass',
        'class',
        'common_name',
        'local_name',
        'image'
    ];

    public $incrementing = false;

    public function catch(){
        return $this->hasMany(FishCatch::class,'fish_id','id');
    }
}
