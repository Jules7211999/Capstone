<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

       return $this->reroute();
      
    }

    public function reroute(){
        
        if(Role() == "Admin"){
            return redirect(RouteServiceProvider::HOME);
        }
        else if(Role() == "User"){
            return redirect(RouteServiceProvider::USER);
        }else{
            dd("error");
        }    
    }
    
   
  
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::guard('web')->logout();

       session()->invalidate();

       session()->regenerateToken();

        return redirect('/');
    }
}
