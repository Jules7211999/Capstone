<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="{{secure_asset('css/app.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Capstone</title>
    </head>
    <body>
    <!-- <nav class="navbar navbar-light bg-light">
        <div class="container d-flex ">
            <span class="navbar-brand mb-0 h1">
                <img id="logo" src="{{asset('img/logo.png')}}" alt="">
                <span class="font-weight-bold ml-2">EPASC</span>
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
    </nav> -->
   <div class="w-100  m-0 wrapper  border d-flex flex-column align-items-center justify-content-center ">
   <img id="logo" src="{{asset('img/logo.png')}}" alt="">
        <div>
            @if ($errors->any())
                <div>
                     @foreach ($errors->all() as $error)
                         <p class="text-danger font-weight-bold">{{$error}}</p>
                    @endforeach
                </div>
             @endif
        
            <form method="POST" action="/register">
                @csrf
                <!-- Name -->
                <div class="text-left text-dark">
                    <label class="font-weight-bold" for="name">Name</label>
                    <input id="name" class="form-control-lg w-100 border border-secondary bg-light" type="text" name="name" value="{{old('name')}}" required autofocus />
                </div>
                <!-- Email Address -->
                <div class="text-left text-dark mt-1">
                   <label class="font-weight-bold" for="emai">Email</label>
                    <input id="email" class="form-control-lg w-100 border border-secondary bg-light" type="email" name="email" value="{{old('email')}}" required />
                </div>
                <!-- Password -->
                <div class="text-left text-dark mt-1">
                   <label class="font-weight-bold" for="password">Password</label>
                    <input id="password" class="form-control-lg w-100 border border-secondary bg-light"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
                <!-- Confirm Password -->
                <div class="text-left text-dark mt-1">
                    <label class="font-weight-bold" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="form-control-lg w-100 border border-secondary bg-light"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
                <!-- role -->
                <div class=" invisible" >
                    <input type="text" name="role" value="SuperUser" required />
                </div>
                <div class="text-right">
                    <a class="text-dark font-weight-light mr-3" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button class=" btn btn-outline-primary font-weight-bold rounded py-1 text-dark px-5" type="submit">
                            Register
                        </button>
                </div>
            </form>
           
    </div>
</div>
 

       <style>
        #logo{
            width: 10rem;
        }
        .wrapper{
            height: 100vh;
            overflow: hidden;
             background-image: linear-gradient(to right,#80cdff , #efefef); 
        
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
