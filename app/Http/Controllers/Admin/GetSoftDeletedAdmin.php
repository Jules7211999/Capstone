<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetSoftDeletedAdmin extends Controller
{
    public function index(){
        return User::onlyTrashed()->where('role','=','Admin')->get();
    }
}
