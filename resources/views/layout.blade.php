<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/app.js')}}"></script> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
@include('partials.nav')
<body class="bg-dark py-4 " style="background-image: url('{{ asset('images/backgroung.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

@yield('contenido')

</body>

</html>

