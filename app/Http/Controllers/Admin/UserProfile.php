<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Superuser.User.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superuser.User.addUser');
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
            'city' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'username' => 'required|unique:App\Models\User,username',
            'barangay' => 'required',
            'marital_status' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();

         User::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone_number,
            'password' => $request->password,
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'username' => $request->username,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'profile_image' => $name,
            'role' => "User",
            'marital_status' => $request->marital_status
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

        return view("Superuser.User.userShow") -> with('data', $data);
    
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
        return view('Superuser.User.editUser')->with('data',$model);
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
            'username' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'marital_status' => 'required'
        ]);

         User::find($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'username' => $request->username,
            'barangay' => $request->barangay,
            'marital_status' => $request->marital_status,
            'city' => $request->city,
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
