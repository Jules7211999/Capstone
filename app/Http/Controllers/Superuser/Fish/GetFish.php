<?php

namespace App\Http\Controllers\Superuser\Fish;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class GetFish extends Controller
{
    public function index(){
        return Fish::all();
    }
}
