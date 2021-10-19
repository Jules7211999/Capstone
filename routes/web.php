<?php



use App\Events\SOSevent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetUserProfile;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';

require __DIR__.'/admin.php';


// api routes
Route::get('/authname',function(){
    $user = Auth::user()->name;
    $User = ucfirst($user);
    return $User;
});

Route::get('/getUserProfile',[GetUserProfile::class,'index']);

//test route

Route::get('/test',function(){
    event(new SOSevent());
});
