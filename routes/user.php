<?php

use App\Http\Controllers\User\Profile;
use App\Http\Controllers\User\ProfileImage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TrackLocationController;


Route::get('/userRegister',function(){
    return view('user.register');
})->middleware('guest')->name('user.register');

Route::get('/home',function(){
    return view("user.home");
})->middleware('auth','verified');


Route::post('/track',[TrackLocationController::class,'store']);

Route::resource('profile',Profile::class);




?>

