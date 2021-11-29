<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Events\SOSevent;
use Illuminate\Http\Request;
use App\Models\EmergencyCall;
use App\Http\Controllers\Controller;

class Sos extends Controller
{
    public function index(){
       return view("user.sos");
}

    public function sos(Request $request){
        $id = rand();
        $dtm = Carbon::now(); 
        EmergencyCall::create([
            'id' => $id,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "user_id" =>  $request->user,
            'datetimezone' => $dtm,
            'month_name' => $dtm -> monthName,
            'day_of_week' => $dtm -> shortLocaleDayOfWeek,
            'status' => "Waiting",
            'type' => $request->type
        ]);
        
        event(new SOSevent());

        return $id;
    
 }

 public function sosRequest($id){
    $emergency = EmergencyCall::find($id);
    return $emergency->status;
 }
}
