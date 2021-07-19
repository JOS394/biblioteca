
<!DOCTYPE html>
<html lang="en">
@include('home.nav')
@include('home.sidebar')

<head>

    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8">

</head>

<body>
    @yield('contenido')

 
</body>
<footer>
    @include('home.footer')
</footer>
</html>


