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
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\HistoryLogController;
use App\Http\Controllers\ReportCatchController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Resource\CatchController;
use App\Http\Controllers\Resource\EmergencySignal;
use App\Http\Controllers\Resource\FishSpeciesController;
use App\Models\Months;

Route::get('/dashboard',[Dashboard::class,'index'])->middleware('auth','verified')->name('dashboard');


Route::get('/map',function(){
    history("Visited Maps");
    return view('Superuser.Map.map');
})->middleware(('auth'));

//Resource Controllers Emergency,User and Admin
Route::resource('emergency',EmergencySignal::class) ->middleware(('auth'));
Route::resource('admin',Admin::class)->middleware(('auth'));
Route::resource('user',UserProfile::class)->middleware(('auth'));
Route::resource('fish',FishSpeciesController::class)->middleware(('auth'));
Route::resource('lgu',Lgu::class)->middleware(('auth'));
Route::resource('barangay',Barangay::class)->middleware(('auth'));
Route::resource('catch',CatchController::class)->middleware(('auth'));
Route::post('/city',[CreateCityController::class,'index'])->middleware(('auth'));
Route::post('/cityUpdate',[CreateCityController::class,'update'])->middleware(('auth'));

//Search Controllers
Route::post('/userSearch',[SearchController::class,'user']);
Route::post('/userSearchDeleted',[SearchController::class,'userdeleted']);
Route::post('/adminSearch',[SearchController::class,'admin']);
Route::post('/adminSearchDeleted',[SearchController::class,'admindeleted']);
Route::post('/fishSearch',[SearchController::class,'fish']);
Route::get('/report/catch/{id}',[ReportCatchController::class,'index']);
Route::get('/barangaySearch',[SearchController::class,'barangay']);
Route::post('/municipalitySearch',[SearchController::class,'municipality']);

Route::post('/sos',[Sos::class,'sos'])->middleware(('auth'));
Route::get('/monitor',[MonitorController::class,'index'])->middleware(('auth'));
Route::get('/monitor/{id}',[MonitorController::class,'subindex'])->middleware(('auth'));
Route::get('monitor/show/{id}',[MonitorController::class,'main'])->middleware(('auth'));
Route::get('/get/{id}',[MonitorController::class,'get'])->middleware(('auth'));
Route::get('/report',[ChartController::class,'all'])->middleware(('auth'));
Route::get('/chart/{fid}/{bid}',[ChartController::class,'individual'])->middleware(('auth'));
Route::get('/history',[HistoryLogController::class,'index'])->middleware(('auth'));
Route::get('/delete/{id}',[DeleteController::class,'index'])->middleware(('auth'));
Route::post('/restore',[DeleteController::class,'restore'])->middleware(('auth'));

Route::post('/addMonths',function(){
   
    $month = ["January","Febuary","March","April", "May", "June", "July", "August", "September","October","November","December"];
    $x = 1;
    foreach($month as $m){
        Months::create([
            'id' => $x,
            'name' => $m
        ]);
        $x +=1;
    }
    
})->middleware(('auth'));


?>