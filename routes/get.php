<?php

use Illuminate\Support\Facades\Route;


Route::get('/getFish',[GetFish::class,'index']);
Route::get('/getMobileProfile/{id}',[MobileGetProfile::class,'index']);
Route::get('/getBarangay',[GetBarangay::class,'index']);
Route::get('/getMunicipality',[GetMunicipality::class,'index']);
Route::get('/getInactiveBarangay',[GetBarangay::class,'inactive']);
Route::get('/getInactiveMunicipality',[GetMunicipality::class,'inactive']);
Route::get('/getMapSos',[GetSos::class,'get']);
Route::get('/getSos',[GetSos::class,'waiting']);
Route::get('/getSosUpdated',[GetSos::class,'processing']);
Route::get('/getSosDone',[GetSos::class,'done']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::get('/getCity',[GetCityController::class,'index']);
Route::get('/getBarang/{id}',[GetBarangay::class,'dropdown']);


?>