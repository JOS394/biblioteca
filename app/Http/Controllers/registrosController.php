<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\activos;
use App\registros;
use App\categoria;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DateTime;
use DataTables;
use Redirect,Response;
use Illuminate\Support\Str;


class registrosController extends Controller
{


    public function index(Request $request)
    {
     
    if ($request->ajax()) {
        $data = registros::join('usuarios', 'usuarios.id', '=', 'registros.id_usuario')
        ->select('registros.id','tipo_registro','id_activo','usuarios.username','registros.id_usuario',
        'registros.nom_activo','marca_act','ubicacion_act','encargado_act','categoria_activo','codigo_activo',
        'estado_fisico_activo','area','registros.foto','estado_activo','destinatario','valor_adquisicion',
        'descripcion','fechaadquisicion','registros.created_at')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d'); return $formatedDate; }) 
        ->editColumn('tipo_registro', function($data) {
            if($data->tipo_registro == 'Ingresado'){
                return '<span class="badge bg-success">'.$data->tipo_registro.'</span>';
            }if($data->tipo_registro == 'Cambiado'){
                return '<span class="badge bg-warning text-dark">'.$data->tipo_registro.'</span>';
            }else{
                return '<span class="badge bg-danger">'.$data->tipo_registro.'</span>';
            }
        })
        ->editColumn('estado_activo', function($data) {
            if($data->estado_activo == 'En uso'){
                return '<span class="badge bg-success">'.$data->estado_activo.'</span>';
            }if($data->estado_activo == 'Descartado'){
                return '<span class="badge bg-danger">'.$data->estado_activo.'</span>';
            }if($data->estado_activo == 'Donado a'||$data->estado_activo == 'Donado por'){
                return '<span class="badge bg-warning text-dark">'.$data->estado_activo.'</span>';
            }else{
                return '<span class="badge bg-info text-dark"">'.$data->estado_activo.'</span>';
            }
        })
        ->editColumn('area', function($data) {
            if($data->area == 'biblioteca'){
                return '<span class="badge bg-light text-dark">'.$data->area.'</span>';
            }if($data->area == 'contabilidad'){
                return '<span class="badge  bg-secondary ">'.$data->area.'</span>';
            }if($data->area == 'compartido'){
                return '<span class="badge bg-dark">'.$data->area.'</span>';
            }
        })
        ->editColumn('nom_activo', function($data) {
            return $data->nom_activo." (<span class='badge badge-light'>".$data->id_activo."</span>)";
        })
        ->addColumn('action','registros.actions')
        ->rawColumns(['action','tipo_registro','nom_activo','estado_activo','area'])
     
        ->make(true);
        }
        
        return view('registros.index');
}
 
    
    public function show($id)
    {
        $activos=activos::findorfail($id);
   

        $registros=registros::join('usuarios', 'usuarios.id', '=', 'registros.id_usuario')
        ->select('registros.id','tipo_registro','id_activo','usuarios.username','registros.id_usuario',
        'registros.nom_activo','marca_act','ubicacion_act','encargado_act','categoria_activo','codigo_activo',
        'estado_fisico_activo','area','registros.foto','estado_activo','destinatario','valor_adquisicion',
        'descripcion','fechaadquisicion','registros.created_at')
        ->where('id_activo','=',$id)->get();
      
        return view('registros.show',compact('registros'))->with('eliminar','ok');
    }
    public function destroy($id)
    {
        $registro = registros::where('id',$id)->delete();
        return redirect()->back()->with('eliminar','ok');
    }

 
}
