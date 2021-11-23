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
        $month = $dtm->format('m');
        Coordinates::create([
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'user_id' => $request -> user,
            'datetimezone' => $dtm,
            'month_name' => $dtm -> monthName,
            'month_id' => $dtm -> $month,
            'day_of_week' => $dtm -> shortLocaleDayOfWeek
        ]);
    }
}