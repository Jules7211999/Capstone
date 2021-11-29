<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{secure_asset('css/app.css') }}">
        <!-- <link rel="stylesheet" href="{{asset('css/app.css') }}"> -->


        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    </head>
    <style>
             #logo{
            width: 13rem;
        }
        input{
            border: 1px solid #3AADF6 ;
        }
        input:focus{
            border: 0;
            outline: 2px solid #0337aa;
        }
    
        </style>
    <body>
        <div id="app" class="container-fluid vh-100 p-5">
                    <div class="row justify-content-center mb-3">
                        <div class="col-xl-4 col-md-4 text-center pt-5">
                            <img id="logo" src="{{asset('img/logo.png')}}" alt="">
                            <p class="mt-2 font-weight-bold text-secondary">EPASC</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-8 text-center bg-light py-5 px-5 rounded ">
                            @yield('content')
                        </div>
                    </div>
        </div>

        
    </body>
</html>
