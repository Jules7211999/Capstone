<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;

class CreateCityController extends Controller
{
    public function index(Request $request)
    {
        city::create([
            'name' => $request->name,
            'zipcode' => $request->postal,
            'status' => "Active"
         ]);
    }
}
