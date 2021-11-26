<?php

use App\Charts\Test;
use App\Http\Controllers\User\Sos;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resource\Lgu;
use App\Http\Controllers\Resource\Admin;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\Resource\Barangay;
use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\Resource\UserProfile;
use App\Http\Controllers\Chart\ChartController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Resource\CatchController;
use App\Http\Controllers\Resource\EmergencySignal;
use App\Http\Controllers\Resource\FishSpeciesController;


Route::get('/dashboard',[Dashboard::class,'index'])->middleware('auth','verified')->name('dashboard');


Route::get('/map',function(){
    return view('Superuser.Map.map');
});

//Resource Controllers Emergency,User and Admin
Route::resource('emergency',EmergencySignal::class);
Route::resource('admin',Admin::class);
Route::resource('user',UserProfile::class);
Route::resource('fish',FishSpeciesController::class);
Route::resource('lgu',Lgu::class);
Route::resource('barangay',Barangay::class);
Route::resource('catch',CatchController::class);

Route::post('/city',[CreateCityController::class,'index']);
Route::post('/cityUpdate',[CreateCityController::class,'update']);

//User/Admin Search
Route::post('/userSearch',[SearchController::class,'user']);
Route::post('/adminSearch',[SearchController::class,'admin']);
Route::post('/fishSearch',[SearchController::class,'fish']);

Route::post('/sos',[Sos::class,'sos']);

Route::get('/monitor',[MonitorController::class,'index']);
Route::get('/monitor/{id}',[MonitorController::class,'subindex']);
Route::get('monitor/show/{id}',[MonitorController::class,'main']);
Route::get('/get/{id}',[MonitorController::class,'get']);

Route::get('/report',[ChartController::class,'all']);
Route::get('/chart/{fid}/{bid}',[ChartController::class,'individual']);


?>