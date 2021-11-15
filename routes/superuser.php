<?php

use App\Http\Controllers\User\Sos;
use App\Http\Controllers\Admin\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetSos;
use App\Http\Controllers\Admin\GetPost;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\GetAdmin;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\GetBarangay;
use App\Http\Controllers\Admin\GetLocation;
use App\Http\Controllers\Admin\UserProfile;
use App\Http\Controllers\Admin\EmergencySignal;
use App\Http\Controllers\Admin\GetMunicipality;
use App\Http\Controllers\Superuser\Fish\GetFish;
use App\Http\Controllers\Superuser\Resource\Lgu;
use App\Http\Controllers\Superuser\MobileGetProfile;
use App\Http\Controllers\Superuser\SearchController;
use App\Http\Controllers\Superuser\Resource\Barangay;
use App\Http\Controllers\Superuser\FishSpeciesController;
use App\Http\Controllers\Admin\SearchUserLocationController;
use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\Superuser\GetCityController;
use App\Http\Controllers\Superuser\resource\CatchController;

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

?>