<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    <div id="app" class="w-100 vh-100 m-0 p-0">
       <main-container-component>
           
            @yield('content')
       </main-container-component>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>