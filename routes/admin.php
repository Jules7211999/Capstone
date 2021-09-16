<?php

use App\Http\Controllers\Admin\GetLocation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\UserProfile;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth','verified')->name('dashboard');



Route::get('/messages',function(){
    return view('admin.messages');
})->middleware('auth','verified')->name('messages');

Route::get('/map',function(){
    return view('admin.map');
});

Route::resource('user',UserProfile::class);

//api routes

Route::get('/getUser',[GetUser::class,'index']);

Route::get('/GetLocation',[GetLocation::class,'index']);
?>