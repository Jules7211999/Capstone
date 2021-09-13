<?php

use App\Providers\RouteServiceProvider;

if(! function_exists('Role')){
    function Role(){
        return auth()->user()->role;
    }
}

function reroute(){
        
    if(Role() == "Admin"){
        return RouteServiceProvider::HOME;
    }
    else if(Role() == "User"){
        return RouteServiceProvider::USER;
    }else{
        dd("error");
    }
}