<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetPost extends Controller
{
    public function index(){
        return Post::all();
    }
}
