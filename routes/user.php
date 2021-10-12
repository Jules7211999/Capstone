<?php



use App\Http\Controllers\User\Sos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\User\TrackLocationController;


Route::get('/userRegister',function(){
    return view('user.register');
})->middleware('guest')->name('user.register');

Route::get('/home',function(){
    return view("user.home");
})->middleware('auth',);

Route::get('/sos',[Sos::class,'index']);
Route::post('/track',[TrackLocationController::class,'store']);
Route::get('geoerror',function(){
    return view("user.geoError");
});


Route::resource('profile',Profile::class);




