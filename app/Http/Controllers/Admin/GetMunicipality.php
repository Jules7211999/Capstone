<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\municipal;


class GetMunicipality extends Controller
{
    public function index(){
        return municipal::where('status','=','Active')->get();
    }

    public function inactive(){
        return municipal::where('status','=','Inactive')->get();
    }
}
