<?php

namespace App\Http\Controllers\Fish;

use App\Http\Controllers\Controller;
use App\Models\fish;
use Illuminate\Http\Request;

class GetFish extends Controller
{
    public function index(){
        return fish::all();
    }
}
