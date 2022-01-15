<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportCatchController extends Controller
{
    public function index(){
        return view('Superuser.Catch.report');
    }
}
