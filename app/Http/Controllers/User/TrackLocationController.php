<?php

namespace App\Http\Controllers\User;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TrackLocationController extends Controller
{
    public function store(Request $request){
        $dtm = Carbon::now(); 
        Coordinates::create([
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'user_id' => auth()->user()->id,
            'datetimezone' => $dtm,
            'month_name' => $dtm -> monthName,
            'day_of_week' => $dtm -> shortLocaleDayOfWeek
        ]);
    }
}