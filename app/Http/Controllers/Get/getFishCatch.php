<?php

namespace App\Http\Controllers\Get;

use App\Http\Controllers\Controller;
use App\Models\FishCatch;
use Illuminate\Http\Request;

class getFishCatch extends Controller
{
    public function index($barangayid, $fishid){
       
      
       
       $fish = FishCatch::where('barangay_id','=',$barangayid)->where('fish_id','=',$fishid)->with('barangay')->orderBy('created_at','desc')->limit(5)->get();
       return $fish;
    }
}
