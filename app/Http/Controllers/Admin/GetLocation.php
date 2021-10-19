<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coordinates;

use Illuminate\Http\Request;

class GetLocation extends Controller
{
    public function index(){
        return Coordinates::with("user")->get();
    }
}
