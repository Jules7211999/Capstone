<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmergencyCall;
use Illuminate\Http\Request;

class UpdateSosController extends Controller
{
    public function Ongoing(Request $request){

            EmergencyCall::find($request->id)->update([
                "status" => "On going"
            ]);
    }

    public function Success(Request $request){

            EmergencyCall::find($request->id)->update([
                "status" => "success"
            ]);
    }
}
