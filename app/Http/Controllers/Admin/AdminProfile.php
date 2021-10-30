<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AdminProfile extends Controller
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
        return view('Superuser.Admin.addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'image' => 'required'
        ]);

         $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        
        $user = User::updateOrCreate([
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
            'email_verified_at' => Carbon::now()
        ]);
    
            // $filepath = $name;
            // Storage::disk('s3')->put($filepath,file_get_contents($file));

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

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required',
            'barangay' => 'required',
            'marital_status' => 'required'
        ]);

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
            'marital_status' => $request->marital_status
        ]);

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
