<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetPost;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\AdminPost;
use App\Http\Controllers\Admin\EmergencySignal;
use App\Http\Controllers\Admin\GetLocation;
use App\Http\Controllers\Admin\GetSos;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\UserProfile;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth,verified',)->name('dashboard');



Route::get('/messages',function(){
    return view('admin.messages');
})->middleware('auth',)->name('messages');

Route::get('/map',function(){
    return view('admin.map');
});
Route::resource('user',UserProfile::class);
Route::resource('post',AdminPost::class);
Route::resource('emergency',EmergencySignal::class);
Route::post('/userCreate',[UserCreateController::class,'index']);

//api routes
Route::get('/getSos',[GetSos::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/GetLocation',[GetLocation::class,'index']);

?>