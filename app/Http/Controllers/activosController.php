<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\activos;
use App\registros;
use App\categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use DataTables;
use Redirect,Response;
use Illuminate\Support\Str;

class activosController extends Controller
{
    public function create()
    {
        $categorias=categoria::select('id','nom_categoria')->get();
        return view('activos.create',compact('categorias'));

    }

    public function index(Request $request)
    {
      

        if ($request->ajax()) {
            $data = activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
            ->select('activos.id','nom_activo','marca_act','ubicacion_act','encargado_act','categoria_activo',
            'codigo_activo','username','estado_fisico_activo','area','activos.foto','estado_activo',
            'destinatario','valor_adquisicion','fechaadquisicion',
            'descripcion','activos.created_at','activos.updated_at')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d'); return $formatedDate; }) 
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
            ->addColumn('actions','activos.actions')
            ->rawColumns(['actions','estado_activo','area'])
            ->make(true);
            }
            
            return view('activos.index');
    }

    public function store(Request $request){
      $request->validate([
            'nom_activo'      => 'required|string|min:5|max:50',
            'marca_act'       => 'required|string|min:2|max:15',
            'ubicacion_act'   => 'required|string|min:5|max:60',
            'encargado_act'   => 'required|string|min:4|max:100',
         
            'categoria_activo'=> 'required|string|min:4|max:25',
            'codigo_activo'   => 'string|min:4|max:20',
            'id_usuario'      => 'required|int',
            'estado_fisico_activo'   => 'required|string|min:3|max:20',
            'foto'            => 'required|image|mimes:jpeg,png|max:3000',
            'estado_activo'   => 'required|string|min:4|max:20',
            'descripcion'     => 'required|min:2',
            'area'            => 'required'
            ]);

        //se ingresan los activos a la base de datos
        $activosDB = new activos;
        $activosDB->nom_activo = $request->nom_activo;    
        $activosDB->marca_act = $request->marca_act;
        $activosDB->ubicacion_act = $request->ubicacion_act;
        $activosDB->encargado_act = $request->encargado_act;
        $activosDB->categoria_activo = $request->categoria_activo;
        $activosDB->codigo_activo = $request->codigo_activo;
        $activosDB->id_usuario = $request->id_usuario;
        $activosDB->estado_activo = $request->estado_activo;
        if($request->estado_activo=="En uso" || $request->estado_activo=="Descartado"){
            $activosDB->destinatario = null;  
        }else{
        $activosDB->destinatario = $request->articulop." ".$request->destino;
    }
        $activosDB->estado_fisico_activo = $request->estado_fisico_activo;
        $activosDB->area = $request->area;
        $activosDB->valor_adquisicion = $request->valor_adquisicion;
        if ($request->hasFile('foto')) {
            $activosDB->foto = $request->file('foto')->store('uploads','public');
        }
        $activosDB->fechaadquisicion =$request->date; 
        $activosDB->descripcion = $request->descripcion;

        $activosDB->save();

        $registrosDB = new registros;
        $registrosDB->tipo_registro = 'Ingresado';
        $registrosDB->id_activo =  activos::latest('id')->pluck('id')->first();
        $registrosDB->id_usuario =  $activosDB->id_usuario;
        $registrosDB->nom_activo = $activosDB->nom_activo;
        $registrosDB->marca_act = $activosDB->marca_act;
        $registrosDB->ubicacion_act = $activosDB->ubicacion_act;
        $registrosDB->encargado_act =  $activosDB->encargado_act;
        $registrosDB->categoria_activo = $activosDB->categoria_activo;
        $registrosDB->codigo_activo = $activosDB->codigo_activo;
        $registrosDB->estado_activo = $activosDB->estado_activo;
        $registrosDB->destinatario = $activosDB->destino;
        $registrosDB->estado_fisico_activo = $request->estado_fisico_activo;
        $registrosDB->area = $request->area;
        $registrosDB->valor_adquisicion = $request->valor_adquisicion;
        $registrosDB->foto = $request->file('foto')->store('uploads/registros/'.$registrosDB->id_activo,'public');
        $registrosDB->descripcion = $request->descripcion;      
        $registrosDB->fechaadquisicion = date('Y-m-d', strtotime($request->date)); 
        $registrosDB->descripcion = $request->descripcion; 
        $registrosDB->save();

         return redirect('activos')->with('agregado','ok');
 
     }


     public function edit($id)
     {
        $categorias=DB::table('categorias')
        ->select('id','nom_categoria')->get();

        $where = array('id' => $id);
       $response=Response::json($activo = activos::where($where)->first());
  

        return view('activos.edit',compact('categorias','activo'));
         }


        


         public function update(Request $request,$id)
        {
            $activosDB = activos::find($id);
            $activosDB->nom_activo = $request->nom_activo;
        $activosDB->marca_act = $request->marca_act;
        $activosDB->ubicacion_act = $request->ubicacion_act;
        $activosDB->encargado_act = $request->encargado_act;
        $activosDB->categoria_activo = $request->categoria_activo;
        $activosDB->codigo_activo = $request->codigo_activo;
        $activosDB->id_usuario = $request->id_usuario;
        $activosDB->estado_activo = $request->estado_activo;
        if($request->estado_activo=="En uso" || $request->estado_activo=="Descartado"){
            $activosDB->destinatario = null;  
        }else{
        $activosDB->destinatario = $request->articulop." ".$request->destino;
    }
        $activosDB->estado_fisico_activo = $request->estado_fisico_activo;
        $activosDB->area = $request->area;
        $activosDB->valor_adquisicion = $request->valor_adquisicion;
      
        if ($request->hasFile('foto')) {
            $activosDB = activos::findOrFail($id);
            Storage::delete('public/uploads'.$activosDB->foto);
            $activosDB->foto = $request->file('foto')->store('uploads','public');
        }
        $activosDB->fechaadquisicion =$request->date; 
        $activosDB->descripcion = $request->descripcion; 
        $activosDB->save();


        $registrosDB = new registros;
        $registrosDB->tipo_registro = 'Cambiado';
        $registrosDB->id_activo = $activosDB->id;
        $registrosDB->id_usuario =  $activosDB->id_usuario;
        $registrosDB->nom_activo = $activosDB->nom_activo;
        $registrosDB->marca_act = $activosDB->marca_act;
        $registrosDB->ubicacion_act = $activosDB->ubicacion_act;
        $registrosDB->encargado_act =  $activosDB->encargado_act;
        $registrosDB->categoria_activo = $activosDB->categoria_activo;
        $registrosDB->codigo_activo = $activosDB->codigo_activo;
        $registrosDB->estado_activo = $activosDB->estado_activo;
        $registrosDB->estado_fisico_activo = $activosDB->estado_fisico_activo;
        $registrosDB->area = $activosDB->area;
        if ($request->hasFile('foto')) {
        Storage::disk('public')->delete($registrosDB->foto);
        $name_file=$registrosDB->id_activo;
        $registrosDB->foto = $request->file('foto')->store('uploads/registros/edit/'.$name_file,'public');
        }
        $registrosDB->descripcion = $activosDB->descripcion;
        $registrosDB->fechaadquisicion = $activosDB->date;  

        $registrosDB->save();

           return redirect('activos')->with('editado','ok');

        }

        

     public function destroy($id)
     {
         if (Auth::user()->hasPermissionTo('eliminar activos')) {
     
       

        $activosDB = activos::find($id);
        $registrosDB = new registros;
        $registrosDB -> tipo_registro = 'Dado de baja';
        $registrosDB->id_activo = $activosDB->id;
        $registrosDB->id_usuario =  $activosDB->id_usuario;
        $registrosDB->nom_activo = $activosDB->nom_activo;
        $registrosDB->marca_act = $activosDB->marca_act;
        $registrosDB->ubicacion_act = $activosDB->ubicacion_act;
        $registrosDB->encargado_act =  $activosDB->encargado_act;
        $registrosDB->categoria_activo = $activosDB->categoria_activo;
        $registrosDB->codigo_activo = $activosDB->codigo_activo;
        $registrosDB->estado_activo = $activosDB->estado_activo;
        $registrosDB->estado_fisico_activo = $activosDB->estado_fisico_activo;
        $registrosDB->area = $activosDB->area;
        $registrosDB->descripcion = $activosDB->descripcion;
        $registrosDB->fechaadquisicion = $activosDB->date;  
        $registrosDB -> foto =  $activosDB->foto;
        $registrosDB -> descripcion =  $activosDB->descripcion;

        $registrosDB-> save();
         
        $activo = activos::where('id',$id)->delete();
     return redirect('activos')->with('eliminar','ok');
    }else{
        return redirect('activos')->with('sinpermisos','ok'); 
    }
   

        //return redirect()->route('users.index');
// $deletedRows =   activos::find($id_activo)->delete();
//  return redirect('activos')->with('eliminar','ok');

     } 


}
