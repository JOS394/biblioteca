<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\activos;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('activos',function(){

    // return datatables()
    // ->of($activos)->toJson();

$activos= activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
    ->select('activos.id','nom_activo','marca_act','ubicacion_act'
    ,'encargado_act','categoria_activo','codigo_activo','username'
    ,'estado_fisico_activo','area','activos.foto','estado_activo'
    ,'descripcion','activos.fechaadquisicion','activos.created_at'
    ,'activos.updated_at');

    return DataTables::of($activos)
    ->addColumn('actions','activos.actions')
    ->rawColumns(['actions'])
    ->make(true);
}
);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

