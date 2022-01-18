<?php

use App\Http\Controllers\Get\GetSos;
use App\Http\Controllers\Get\GetUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fish\GetFish;
use App\Http\Controllers\Get\GetAdmin;
use App\Http\Controllers\Get\GetBarangay;
use App\Http\Controllers\Get\GetLocation;

use App\Http\Controllers\Get\GetMunicipality;
use App\Http\Controllers\Get\GetCityController;
use App\Http\Controllers\Get\getFishCatch;
use App\Http\Controllers\MobileProfile;

Route::get('/getFish',[GetFish::class,'index']);
Route::get('MobileProfile/{id}',[MobileProfile::class,'index']);
Route::get('/getBarangay',[GetBarangay::class,'index']);
Route::get('/getBarangayInactiveByCity',[GetBarangay::class,'inactiveByCity']);
Route::get('/getBarangayActiveByCity',[GetBarangay::class,'activeByCity']);
Route::get('/getMonitorBarangay/{id}',[GetBarangay::class,'monitor']);
Route::get('/getMunicipality',[GetMunicipality::class,'index']);
Route::get('/getInactiveBarangay',[GetBarangay::class,'inactive']);
Route::get('/getInactiveMunicipality',[GetMunicipality::class,'inactive']);
Route::get('/getMapSos',[GetSos::class,'get']);
Route::get('/getSos',[GetSos::class,'waiting']);
Route::get('/getSosUpdated',[GetSos::class,'processing']);
Route::get('/getSosCanceled',[GetSos::class,'Canceled']);
Route::get('/getSosDone',[GetSos::class,'done']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getAdminDeleted',[GetAdmin::class,'deleted']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getUserDeleted',[GetUser::class,'deleted']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::get('/getCity',[GetCityController::class,'index']);
Route::get('/getBarang/{id}',[GetBarangay::class,'dropdown']);
Route::get('/getCatch/{barangayid}/{fishid}',[getFishCatch::class,'index']);


?>