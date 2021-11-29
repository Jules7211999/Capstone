<?php

namespace App\Http\Controllers\Resource;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\city;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        history("Visited the Admin Page");
        return view('Superuser.Admin.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangay = barang::where('status','=','Active')->get();
        $municipality = city::where('status','=','Active')->get();
        history("Visited the Create Admin Page");
        return view('Superuser.Admin.addAdmin',['municipality'=> $municipality, 'barangay' => $barangay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
   
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|unique:App\Models\User,email',
            'barangay' => 'required',
            'marital_status' => 'required',
            'image' => 'required|mimes:jpg,png',
            'city' => 'required'
        ]);

         $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        
         User::updateOrCreate([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'address'=> $request->address,
            'gender' => $request->gender,
            'birthdate' => $request-> birthdate,
            'email' => $request->email,
            'barangay_id' => $request->barangay,
            'phone_number' => $request->phone_number,
            'role' => "Admin",
            'marital_status' => $request->marital_status,
            'profile_image' => $name,
            'email_verified_at' => Carbon::now(),
            'city_id' => $request->city
        ]);
    
            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));

        history("Created Admin ". $request->name);
        return redirect()->back()->with('message','User Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::where('id','=',$id)->with(['city','barangay'])->get();
        $data = $model->toJson();
        history("Visited the Profile of ". $model[0]->name);
        return view("Superuser.Admin.adminShow") -> with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model= User::find($id);
        $barangay = barang::all();
        $municipality = city::all();
        history("Visited Edit Admin Page");
        return view('Superuser.Admin.editAdmin',['data'=> $model,'barangay' => $barangay,'municipality' => $municipality]);
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
       
      
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|max:255',
                'phone_number' => 'required|numeric',
                'gender' => 'required',
                'birthdate' => 'required',
                'password' => 'required|confirmed|min:8',
                'email' => 'required',
                'barangay' => 'required',
                'marital_status' => 'required',
                'image' => 'mimes:jpg,png',
                'city' => 'required'
            ]);
        
     
        if($request->file('image') == null){
            User::find($id)->update([
                'name' => $request->name,
                'birthdate' => $request->birthdate,
                'phone' => $request->phone_number,
                'password' => Hash::make($request->password),
                'address'=> $request->address,
                'gender' => $request->gender,
                'date' => $request-> birthdate,
                'email' => $request->email,
                'barangay_id' => $request->barangay,
                'phone_number' => $request->phone_number,
                'marital_status' => $request->marital_status,
                'city_id' => $request->city,
                'image' => 'mimes:jpg,png',
                
            ]);
    
        }else{
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();

            User::find($id)->update([
                'id' =>rand(),
                'name' => $request->name,
                'birthdate' => $request->birthdate,
                'phone' => $request->phone_number,
                'password' => Hash::make($request->password),
                'address'=> $request->address,
                'gender' => $request->gender,
                'date' => $request-> birthdate,
                'email' => $request->email,
                'barangay' => $request->barangay,
                'phone_number' => $request->phone_number,
                'marital_status' => $request->marital_status,
                'profile_image' => $name,
                'city' => $request->city,
                
            ]);
            
            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));
        }
       history("Updated the Admin Profile of ". $request->name);
        return redirect()->back()->with('message','User Updated');
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
