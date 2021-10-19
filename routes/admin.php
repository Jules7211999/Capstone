<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetPost;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\EmergencySignal;
use App\Http\Controllers\Admin\GetLocation;
use App\Http\Controllers\Admin\GetSos;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SearchUserLocationController;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\UserProfile;
use App\Http\Controllers\Admin\UserSearchController;
use App\Http\Controllers\User\Sos;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth',)->name('dashboard');


Route::get('/map',function(){
    return view('admin.map');
});

Route::resource('user',UserProfile::class);
Route::resource('emergency',EmergencySignal::class);
Route::post('/userCreate',[UserCreateController::class,'index']);
Route::post('/userSearch',[UserSearchController::class,'index']);
Route::get('/profile',[ProfileController::class,'index']);

//api routes
Route::get('/getSos',[GetSos::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::post('/searchUserLocation',[SearchUserLocationController::class,'index']);
Route::post('/sos',[Sos::class,'sos']);


?>