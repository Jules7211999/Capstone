<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Capstone</title>
    </head>
    <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                <img id="logo" src="{{asset('img/logo.png')}}" alt="">
            </span>
        <div>
            @if (Route::has('login'))
                <div class="d-flex">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline font-weight-bold  text-secondary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-weight-bold  text-secondary">Log in</a>
                        <a href="" class="font-weight-bold  text-secondary ml-4">|</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-weight-bold text-secondary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </nav>
   <div class="w-100  wrapper border d-flex align-items-center justify-content-center">
    <img src="{{asset('img/fishingboat.png')}}" class="w-25 h-25" alt="">
    <div>
            <h1 class="ml-5 pb-3 font-weight-bold text-secondary">“Great fish do not swim<br> in shallow waters.”</h1>
            <div class="text-center">
            <button class="btn-signup pl-5 pr-5 rounded font-weight-bold text-secondary">Sign Up</button>
            </div>
            
    </div>
    
   </div>
   <div class="footer">

   </div>

       <style>
        #logo{
            width: 2rem;
        }
        .wrapper{
            height: 95vh;
        }
        .footer{
            height: 30vh;
            background:#6c757d;
        }
        .btn-signup{
            background: transparent;
            border: 2px #6c757d solid;
            
        }
        .btn-signup:hover{
            border: 1px #000 solid;
            color: #000;
            font-weight: 400;
            padding: 0.5rem 1rem ;
            transition: 0.2s;
        }
       </style>
    </body>
</html>
