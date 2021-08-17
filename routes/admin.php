<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth','verified')->name('dashboard');

Route::get('/user',function(){
    return view('admin.user');
})->middleware('auth','verified')->name('user');

Route::get('/messages',function(){
    return view('admin.messages');
})->middleware('auth','verified')->name('messages');



// asdf
?>