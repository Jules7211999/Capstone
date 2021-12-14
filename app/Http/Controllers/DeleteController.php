<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function index($id){
        $delete = User::find($id)->get();
        $delete->delete();

    }
}
