<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="api/track" method="post">
    @csrf
    <input type="text" name="user">
    <input type="text" name="long" id="">
    <input type="text" name="lat">
    
    <input type="submit" value="submit">
</form>
    <form action="/addMonths" method="post">
        @csrf
        <input type="submit">
    </form>

</body>
</html>