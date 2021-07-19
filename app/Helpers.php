<?php
use App\categoria;
use App\Activos;
use App\registros;
use App\usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

function conteoCategorias()
    {
$conteo= categoria::count();
        return $conteo;
    }

    function conteoActivos()
    {
$conteo= activos::count();
        return $conteo;
    }


    function avgRegistrosIn()
    {
$encontrar=  registros::where('tipo_registro', '=', 'ingresado')->count();
$conteo= registros::count();
$avg= ($encontrar/$conteo)*100;
        return $avg;
    }

    function avgRegistrosTotal()
    {
$encontrar=  registros::where('tipo_registro', '=', 'ingresado')->count();
$conteo= registros::count();
$avg= $encontrar/$conteo;
        return $avg;
    }

    function conteoUsuarios()
    {
$conteo= usuarios::count();
        return $conteo;
    }
    function conteoRegistros()
    {
$conteo= registros::count();
        return $conteo;
    }

    function Logout()
    {
Auth::logout();
session()->invalidate();
session()->regenerateToken();

        return redirect('/');
    }
  
    function fecha()
    {
        $fecha = Carbon::now();
        $fecha = $fecha->format('d-m-Y');
        return $fecha;
    }

    function conteoPapelera()
    {

     $papelera1=   activos::onlyTrashed()->count();
     $papelera2=   registros::onlyTrashed()->count();
    $conteo=  $papelera1+$papelera2;
        return $conteo;
    }
