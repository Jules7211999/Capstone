<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
   
    @foreach($user as $u)
        @foreach($u->coordinates as $u)
        {{$u}}
        @endforeach
    @endforeach
   
</body>
</html>