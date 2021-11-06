<?php

namespace App\Http\Controllers\Admin;

use App\Models\city;
use App\Http\Controllers\Controller;


class GetMunicipality extends Controller
{
    public function index(){
        return city::where('status','=','Active')->get();
    }

    public function inactive(){
        return city::where('status','=','Inactive')->get();
    }
}
