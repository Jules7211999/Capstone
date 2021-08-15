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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="container-fluid vh-100 ">
            <div class="h-25 w-100">
            </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-xl-4 col-md-4 text-center">
                            <img src="{{asset('img/logo.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-8 text-center bg-light py-5 px-5 rounded shadow-lg">
                            @yield('content')
                        </div>
                    </div>
        </div>
    </body>
</html>
