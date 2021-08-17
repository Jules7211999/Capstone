<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet"/>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body >
        <div id="app" class="w-100 vh-100 m-0 p-0">
           <div class=" row w-100 m-0 position-absolute">
             <topbar-component/>
           </div>
           <div class="row w-100 h-100 mt-5 pt-5 position-fixed">
               <div class="col-xl-2">
                   <sidebar-component/>  
               </div>                    
              <div class="col-xl-10">
                    @yield('content')                  
              </div>
           </div>
        </div>
    </body>
</html>
