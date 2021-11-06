<?php

use App\Models\municipal;
use Illuminate\Http\Request;
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
use App\Http\Controllers\Superuser\resource\Municipality;
use App\Http\Controllers\Admin\SearchUserLocationController;

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
Route::resource('municipality',Municipality::class);
Route::resource('barangay',Barangay::class);
Route::post('/addmunicipality',function(Request $request){
    municipal::create([
        'name' => $request->name,
       'postal_code' => $request->postal,
       'status' => "Active"
 ]);
});
//User/Admin Search
Route::post('/userSearch',[SearchController::class,'user']);
Route::post('/adminSearch',[SearchController::class,'admin']);

//api routes
Route::get('/getFish',[GetFish::class,'index']);
Route::get('/getMobileProfile/{id}',[MobileGetProfile::class,'index']);
Route::get('/getBarangay',[GetBarangay::class,'index']);
Route::get('/getMunicipality',[GetMunicipality::class,'index']);
Route::get('/getInactiveBarangay',[GetBarangay::class,'inactive']);
Route::get('/getInactiveMunicipality',[GetMunicipality::class,'inactive']);
Route::post('/sos',[Sos::class,'sos']);
Route::get('/getMapSos',[GetSos::class,'get']);
Route::get('/getSos',[GetSos::class,'waiting']);
Route::get('/getSosUpdated',[GetSos::class,'processing']);
Route::get('/getSosDone',[GetSos::class,'done']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::post('/searchUserLocation',[SearchUserLocationController::class,'index']);




?>