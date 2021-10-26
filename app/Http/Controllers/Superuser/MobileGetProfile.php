<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileGetProfile extends Controller
{
    public function index($id){
        return $id;
    }
}
