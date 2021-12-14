<?php

namespace App\Http\Controllers\Get;

use App\Models\city;
use App\Http\Controllers\Controller;


class GetMunicipality extends Controller
{
    public function index(){
        return city::where('status','=','Active')->groupBy('name')->get();
    }

    public function inactive(){
        return city::where('status','=','Inactive')->groupBy('name')->get();
    }
}
