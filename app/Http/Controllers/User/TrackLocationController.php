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
        $month_name = $dtm -> format('M');
        Coordinates::create([
            'latitude' => $request->lat,
            'longitude' => $request->long,
            'user_id' => $request -> user,
            'datetimezone' => $dtm,
            'month_name' => $month_name,
            'month_id' =>  $month,
            'day_of_week' => $dtm -> shortLocaleDayOfWeek
        ]);
    }
}