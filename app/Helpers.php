<?php


if(! function_exists('Role')){
    function Role(){
        return auth()->user()->role;
    }
}