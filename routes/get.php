<?php

use App\Http\Controllers\Get\GetSos;
use App\Http\Controllers\Get\GetUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Get\GetAdmin;
use App\Http\Controllers\Get\GetBarangay;
use App\Http\Controllers\Get\GetLocation;
use App\Http\Controllers\Get\GetMunicipality;
use App\Http\Controllers\Get\GetCityController;
use App\Http\Controllers\Superuser\Fish\GetFish;
use App\Http\Controllers\Superuser\MobileGetProfile;




Route::get('/getFish',[GetFish::class,'index']);
Route::get('/getMobileProfile/{id}',[MobileGetProfile::class,'index']);
Route::get('/getBarangay',[GetBarangay::class,'index']);
Route::get('/getMonitorBarangay/{id}',[GetBarangay::class,'monitor']);
Route::get('/getMunicipality',[GetMunicipality::class,'index']);
Route::get('/getInactiveBarangay',[GetBarangay::class,'inactive']);
Route::get('/getInactiveMunicipality',[GetMunicipality::class,'inactive']);
Route::get('/getMapSos',[GetSos::class,'get']);
Route::get('/getSos',[GetSos::class,'waiting']);
Route::get('/getSosUpdated',[GetSos::class,'processing']);
Route::get('/getSosDone',[GetSos::class,'done']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::get('/getCity',[GetCityController::class,'index']);
Route::get('/getBarang/{id}',[GetBarangay::class,'dropdown']);


?>