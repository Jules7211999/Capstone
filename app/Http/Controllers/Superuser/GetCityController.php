<?php

namespace App\Http\Controllers\Superuser;

use App\Models\city;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCityController extends Controller
{
    public function index(){
        $municipality = city::where('status','=','Active')->get();
        return $municipality;
    }
}
