<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet"/>
        <!-- Scripts -->
        <script src="{{secure_asset('js/app.js') }}" defer></script>
        <script src="{{asset('js/app.js') }}" defer></script>
    </head>
    <body >
        <div id="app" class="w-100 vh-100">
              @yield('content')
        </div>
    </body>


    
</html>
