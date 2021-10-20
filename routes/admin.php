<?php

use App\Http\Controllers\User\Sos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetSos;
use App\Http\Controllers\Admin\GetPost;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\GetAdmin;
use App\Http\Controllers\Admin\GetLocation;
use App\Http\Controllers\Admin\UserProfile;
use App\Http\Controllers\Admin\AdminProfile;
use App\Http\Controllers\Admin\EmergencySignal;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UpdateSosController;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\UserSearchController;
use App\Http\Controllers\Admin\AdminCreateController;
use App\Http\Controllers\Admin\AdminSearchController;
use App\Http\Controllers\Admin\SearchUserLocationController;


Route::get('/dashboard', function () {
    return view('Superuser.dashboard');
})->middleware('auth',)->name('dashboard');


Route::get('/map',function(){
    return view('Superuser.map');
});

Route::resource('user',UserProfile::class);
Route::resource('emergency',EmergencySignal::class);
Route::resource('admin',AdminProfile::class);

Route::post('/userCreate',[UserCreateController::class,'index']);

Route::post('/userSearch',[UserSearchController::class,'index']);
Route::post('/adminSearch',[AdminSearchController::class,'index']);
Route::get('/profile',[ProfileController::class,'index']);
Route::post('/SosUpdateOngoing',[UpdateSosController::class,'Ongoing']);
Route::post('/SosUpdateSuccess',[UpdateSosController::class,'Success']);


//api routes
Route::post('/sos',[Sos::class,'sos']);
Route::get('/getSos',[GetSos::class,'index']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::post('/searchUserLocation',[SearchUserLocationController::class,'index']);

// admin barangay
Route::post('/adminCreate',[AdminCreateController::class,'index']);
?>