<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function index($id){
        $delete = User::find($id);
        $delete->delete();

        if($delete->role == "Admin"){
            return redirect('/admin');
        }
        else{
            return redirect('/user');
        }
        
    }

    public function restore(Request $request){
        $restore = User::onlyTrashed()->find($request->id);
        $restore->restore();
    }
    
}
