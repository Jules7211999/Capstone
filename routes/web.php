<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});



require __DIR__.'/auth.php';

require __DIR__.'/superuser.php';

require __DIR__.'/get.php';



//test route

Route::get('/test/{id}',function($id){
    $user = User::find($id);
        return response()->json([
            
            'name' => $user->name,
            'username' => $user->username,
            'marital_status' => $user->marital_status,
            'phone_number' => $user->phone_number,
            'profile_image' => $user->profile_image,
            'gender' => $user->gender,
            'birthdate' => $user->birthdate,
            'address' => $user->address,
            'city' => $user->city->name,
            'barangay' => $user->barangay->name 

        ]);
});
