<?php

use Illuminate\Http\Request;
use App\Http\Controllers\User\Sos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthenticateMobileApp;
use App\Http\Controllers\User\TrackLocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authenticate',[AuthenticateMobileApp::class,'index']);
Route::post('/track',[TrackLocationController::class,'store']);
Route::post('/sos',[Sos::class,'sos']);
Route::post('/sosCancel',[Sos::class,'cancel']);
Route::get('/sosRequest/{id}',[Sos::class,'sosRequest']);


// test route
Route::post('/test',function(Request $request){
  
    $user  = $request->username;

return response()->json([
        "success" => $user
    ]);
    
});


