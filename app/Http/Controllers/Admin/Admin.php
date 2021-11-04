<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\municipal;
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
        $municipality = municipal::where('status','=','Active')->get();

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
            'image' => 'required',
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
            'barangay' => $request->barangay,
            'phone_number' => $request->phone_number,
            'role' => "Admin",
            'marital_status' => $request->marital_status,
            'profile_image' => $name,
            'email_verified_at' => Carbon::now(),
            'city' => $request->city
        ]);
    
            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));

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
        $model = User::find($id);

        $data = $model->toJson();

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
        return view('Superuser.Admin.editAdmin')->with('data',$model);
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
                'barangay' => $request->barangay,
                'phone_number' => $request->phone_number,
                'marital_status' => $request->marital_status,
                'city' => $request->city
                
            ]);
    
        }else{
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();

            User::find($id)->update([
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
                'city' => $request->city
            ]);
            
            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));
        }
       
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
