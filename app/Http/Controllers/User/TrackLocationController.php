<?php

namespace App\Http\Controllers\User;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackLocationController extends Controller
{
    public function store(Request $request){
        
        Coordinates::create([
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'user_id' => auth()->user()->id
        ]);
    }
}