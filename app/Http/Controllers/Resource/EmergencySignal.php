<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmergencyCall;
use Carbon\Carbon;

class EmergencySignal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        history("Visited SOS Page");
        return view('Superuser.Sos.sos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emergency = EmergencyCall::with('user')->find($id);
      

        history("Visited the SOS of ". " ". $emergency->user->name);
        return view('Superuser.Sos.sosShow',['data' => $emergency]);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $datetime = Carbon::now();
        if($request->status == "Processing"){
            EmergencyCall::find($id)->update([
                'status' => $request->status,
                'dtz_accepted' => $datetime
            ]);
            history("SOS id of ". " " .$id." "."Change to Processing ");
        }else if($request->status == "Done"){
            EmergencyCall::find($id)->update([
                'status' => $request->status,
                'dtz_finished' => $datetime
            ]);
            history("SOS id of ". " " .$id." "."Changed to Done ");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
