<?php

use App\Http\Controllers\User\Sos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GetSos;
use App\Http\Controllers\Admin\GetPost;
use App\Http\Controllers\Admin\GetUser;
use App\Http\Controllers\Admin\GetAdmin;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\GetLocation;
use App\Http\Controllers\Admin\UserProfile;
use App\Http\Controllers\Admin\AdminProfile;
use App\Http\Controllers\Admin\EmergencySignal;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\GetSoftDeletedUser;
use App\Http\Controllers\Admin\GetSoftDeletedAdmin;
use App\Http\Controllers\Admin\UpdateSosController;
use App\Http\Controllers\Admin\UserTrashController;
use App\Http\Controllers\Admin\AdminTrashController;
use App\Http\Controllers\Superuser\CreateController;
use App\Http\Controllers\Superuser\SearchController;
use App\Http\Controllers\Admin\UserSoftDeleteController;
use App\Http\Controllers\Admin\UserSearchTrashController;
use App\Http\Controllers\Admin\AdminSearchTrashController;
use App\Http\Controllers\Admin\SearchUserLocationController;
use App\Http\Controllers\Superuser\BarangayController;
use App\Http\Controllers\Superuser\FishSpeciesController;
use App\Http\Controllers\Superuser\MobileGetProfile;

Route::get('/dashboard',[Dashboard::class,'index'])->middleware('auth','verified')->name('dashboard');


Route::get('/map',function(){
    return view('Superuser.Map.map');
});


//Resource Controllers Emergency,User and Admin
Route::resource('emergency',EmergencySignal::class);
Route::resource('admin',AdminProfile::class);
Route::resource('user',UserProfile::class);
Route::resource('fish',FishSpeciesController::class);
Route::resource('barangay',BarangayController::class);

//User/Admin Search
Route::post('/userSearch',[SearchController::class,'user']);
Route::post('/adminSearch',[SearchController::class,'admin']);

//Search Controllers Soft Deleted Superuser and Admin
Route::post('/userSearchTrash',[UserSearchTrashController::class,'index']);
Route::post('/adminSearchTrash',[AdminSearchTrashController::class,'index']);

// Superuser Profile
Route::get('/profile',[ProfileController::class,'index']);

//Sos Update
Route::post('/SosUpdateOngoing',[UpdateSosController::class,'Ongoing']);
Route::post('/SosUpdateSuccess',[UpdateSosController::class,'Success']);

//Get Soft Deleted Admin and User
Route::get('/getSoftDeletedUsers',[GetSoftDeletedUser::class,'index']);
Route::get('/getSoftDeletedUAdmin',[GetSoftDeletedAdmin::class,'index']);

//Trash Controllers Admin and User
Route::get('/userTrash',[UserTrashController::class,'index']);
Route::get('/adminTrash',[AdminTrashController::class,'index']);
Route::post('/trashRestore',[AdminTrashController::class,'restore']);


//api routes
Route::get('/getMobileProfile/{id}',[MobileGetProfile::class,'index']);
Route::post('/sos',[Sos::class,'sos']);
Route::get('/getSos',[GetSos::class,'index']);
Route::get('/getAdmin',[GetAdmin::class,'index']);
Route::get('/getUser',[GetUser::class,'index']);
Route::get('/getpost',[GetPost::class,'index']);
Route::get('/getLocation',[GetLocation::class,'index']);
Route::post('/searchUserLocation',[SearchUserLocationController::class,'index']);
Route::post('/softDelete',[UserSoftDeleteController::class,'index']);

// admin barangay

?>