<?php

namespace App\Http\Controllers\Get;

use App\Models\city;
use App\Http\Controllers\Controller;


class GetMunicipality extends Controller
{
    public function index(){
        return city::where('status','=','Active')->orderBy('name')->orderBy('name')->get();
    }

    public function inactive(){
        return city::where('status','=','Inactive')->orderBy('name')->orderBy('name')->get();
    }
}
