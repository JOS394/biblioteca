<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activos;
use App\registros;
use App\categoria;

class PapeleraController extends Controller
{
    public function papeleraActivos()
    {
        $activos = activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
        ->select('activos.id','nom_activo','marca_act','ubicacion_act','encargado_act','categoria_activo',
        'codigo_activo','username','estado_fisico_activo','area','activos.foto','estado_activo',
        'destinatario','valor_adquisicion','fechaadquisicion',
        'descripcion','activos.created_at','activos.updated_at')
       ->onlyTrashed()->get();

return view('papelera.activos',compact('activos'));
        }


        public function restoreActivos($id_activo)
        {
        $activoDB= activos::onlyTrashed()->find($id_activo);

        $registrosDB = new registros;
        $registrosDB -> tipo_registro = 'Restaurado';
        // $prueba=  $registrosDB -> id_activo = activos::find($id_activo)->pluck('id_activo')->first();
        $registrosDB -> id_activo = $activoDB->pluck('id')->first();
        $registrosDB -> id_usuario =  $activoDB->id_usuario;
        $registrosDB -> nom_activo = $activoDB->nom_activo;
        $registrosDB -> marca_act =  $activoDB->marca_act;
        $registrosDB -> ubicacion_act =  $activoDB->ubicacion_act;
        $registrosDB -> encargado_act =  $activoDB->encargado_act;
        $registrosDB -> categoria_activo =  $activoDB->categoria_activo;
        $registrosDB -> codigo_activo =  $activoDB->codigo_activo;
        $registrosDB -> estado_activo =  $activoDB->estado_activo;
        $registrosDB -> destinatario =  $activoDB->destinatario;
        $registrosDB -> estado_fisico_activo =  $activoDB->estado_fisico_activo;
        $registrosDB -> area =  $activoDB->area;
        $registrosDB -> valor_adquisicion =  $activoDB->valor_adquisicion;
        $registrosDB -> area =  $activoDB->area;
        $registrosDB -> foto =  $activoDB->foto;
        $registrosDB -> fechaadquisicion =  $activoDB->dominio;
        $registrosDB -> descripcion =  $activoDB->descripcion;

        $registrosDB-> save();

        $activoDB->restore();
    
        return redirect()->back()->with('restaurado','ok');
            }



            
        public function papeleraRegistros()
        {
         
            $registros=registros::join('usuarios', 'usuarios.id', '=', 'registros.id_usuario')
            ->select('registros.id','tipo_registro','usuarios.username','registros.id_usuario',
            'id_activo','registros.nom_activo','marca_act','ubicacion_act','encargado_act',
            'categoria_activo','codigo_activo','estado_fisico_activo','area','registros.foto',
            'estado_activo','descripcion','fechaadquisicion','registros.created_at')
             ->onlyTrashed()->get();
        
            return view('papelera.registros',compact('registros'));
        }


        public function restoreRegistros($id_registro)
        {
        $registroDB= registros::onlyTrashed()->find($id_registro);
        $registroDB->restore();
                
         return redirect()->back()->with('restaurado','ok');
            }


            public function destroy($id_activo)
            {
            
            $activoDB = activos::find($id_activo);
              activos::destroy($id_activo);
    
                return redirect()->back()->with('eliminar','ok');
            }
}
