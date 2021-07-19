<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activos;
use App\registros;
use App\categoria;

class DataTableController extends Controller
{
    public function activos(){
        $activos=activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
        ->select('activos.id','nom_activo','marca_act','ubicacion_act'
        ,'encargado_act','categoria_activo','codigo_activo','username'
        ,'estado_activo','activos.foto','dominio','descripcion','activos.fechaadquisicion','activos.created_at')
        ->get();
        return datatables()->of($activos)->toJson();
    }
}
