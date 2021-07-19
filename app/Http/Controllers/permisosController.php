<?php

namespace App\Http\Controllers;

use App\User;
use App\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class permisosController extends Controller
{
    public function index($id)
    {

        $permisos = DB::table('permissions')
        ->join('model_has_permissions', 'model_has_permissions.permission_id', '=', 'permissions.id')
        ->join('usuarios', 'usuarios.id', '=', 'model_has_permissions.model_id')
        ->select('permissions.name')->where('model_id','=',$id)
        ->get();
        $usuarios=usuarios::select('id','username','tipo_usuario')->where('id','=',$id)->get();

    return view('permisos.index',compact('usuarios','permisos'));

    
        }

        public function edit($id)
        {

            $permisos = DB::table('permissions')
            ->join('model_has_permissions', 'model_has_permissions.permission_id', '=', 'permissions.id')
            ->join('usuarios', 'usuarios.id', '=', 'model_has_permissions.model_id')
            ->select('permissions.name')->where('model_id','=',$id)
            ->get();

   
    
            $usuario=user::findOrfail($id);
            
            return view('permisos.edit',compact('usuario','permisos'));




            }





            public function update($id, Request $request)
            {
                $usuario=user::findOrfail($id);
              
  //permisos activos
               if($request->has('veractivos')){
                $usuario->revokePermissionTo('ver activos');
                $usuario->givePermissionTo('ver activos');
                   
               }else{
                $usuario->revokePermissionTo('ver activos');
               }
               if($request->has('crearactivos')){
                $usuario->revokePermissionTo('crear activos');
                $usuario->givePermissionTo('crear activos');
                   
               }else{
                $usuario->revokePermissionTo('crear activos');
               }


               if($request->has('editaractivos')){
                $usuario->revokePermissionTo('editar activos');
                $usuario->givePermissionTo('editar activos');
                   
               }else{
                $usuario->revokePermissionTo('editar activos');
               }
               if($request->has('eliminaractivos')){
                $usuario->revokePermissionTo('eliminar activos');
                $usuario->givePermissionTo('eliminar activos');
                   
               }else{
                $usuario->revokePermissionTo('eliminar activos');
               }
      
//fin permisos activos

  //permisos categorias
               if($request->has('vercategorias')){
                $usuario->revokePermissionTo('ver categorias');
                $usuario->givePermissionTo('ver categorias');
                   
               }else{
                $usuario->revokePermissionTo('ver categorias');
               }
               if($request->has('crearcategorias')){
                $usuario->revokePermissionTo('crear categorias');
                $usuario->givePermissionTo('crear categorias');
                   
               }else{
                $usuario->revokePermissionTo('crear categorias');
               }


               if($request->has('editarcategorias')){
                $usuario->revokePermissionTo('editar categorias');
                $usuario->givePermissionTo('editar categorias');
                   
               }else{
                $usuario->revokePermissionTo('editar categorias');
               }
               if($request->has('eliminarcategorias')){
                $usuario->revokePermissionTo('eliminar categorias');
                $usuario->givePermissionTo('eliminar categorias');
                   
               }else{
                $usuario->revokePermissionTo('eliminar categorias');
               }
         
//fin permisos categorias

 //permisos registros
 if($request->has('verregistros')){
    $usuario->revokePermissionTo('ver registros');
    $usuario->givePermissionTo('ver registros');
       
   }else{
    $usuario->revokePermissionTo('ver registros');
   }



   if($request->has('eliminarregistros')){
    $usuario->revokePermissionTo('eliminar registros');
    $usuario->givePermissionTo('eliminar registros');
       
   }else{
    $usuario->revokePermissionTo('eliminar registros');
   }
   
//fin permisos registros


  //permisos usuarios
  if($request->has('verusuarios')){
    $usuario->revokePermissionTo('ver usuarios');
    $usuario->givePermissionTo('ver usuarios');
       
   }else{
    $usuario->revokePermissionTo('ver usuarios');
   }
   if($request->has('crearusuarios')){
    $usuario->revokePermissionTo('crear usuarios');
    $usuario->givePermissionTo('crear usuarios');
       
   }else{
    $usuario->revokePermissionTo('crear usuarios');
   }


   if($request->has('editarusuarios')){
    $usuario->revokePermissionTo('editar usuarios');
    $usuario->givePermissionTo('editar usuarios');
       
   }else{
    $usuario->revokePermissionTo('editar usuarios');
   }
   if($request->has('eliminarusuarios')){
    $usuario->revokePermissionTo('eliminar usuarios');
    $usuario->givePermissionTo('eliminar usuarios');
       
   }else{
    $usuario->revokePermissionTo('eliminar usuarios');
   }

//fin permisos categorias

//permisos
if($request->has('verpermisos')){
    $usuario->revokePermissionTo('ver permisos');
    $usuario->givePermissionTo('ver permisos');
       
   }else{
    $usuario->revokePermissionTo('ver permisos');
   }
   if($request->has('asignarpermisos')){
    $usuario->revokePermissionTo('asignar permisos');
    $usuario->givePermissionTo('asignar permisos');
       
   }else{
    $usuario->revokePermissionTo('asignar permisos');
   }


   if($request->has('editarpermisos')){
    $usuario->revokePermissionTo('editar permisos');
    $usuario->givePermissionTo('editar permisos');
       
   }else{
    $usuario->revokePermissionTo('editar permisos');
   }
   if($request->has('quitarpermisos')){
    $usuario->revokePermissionTo('quitar permisos');
    $usuario->givePermissionTo('quitar permisos');
       
   }else{
    $usuario->revokePermissionTo('quitar permisos');
   }

//fin permisos


//permisos de insercion masiva 
if($request->has('vermassive')){
    $usuario->revokePermissionTo('ver massive');
    $usuario->givePermissionTo('ver massive');
       
   }else{
    $usuario->revokePermissionTo('ver massive');
   }
   if($request->has('runmassive')){
    $usuario->revokePermissionTo('run massive');
    $usuario->givePermissionTo('run massive');
       
   }else{
    $usuario->revokePermissionTo('run massive');
   }


//fin permisos

//permisos de Papelera
if($request->has('vertrashactivos')){
    $usuario->revokePermissionTo('ver trashActivos');
    $usuario->givePermissionTo('ver trashActivos');
       
   }else{
    $usuario->revokePermissionTo('ver trashActivos');
   }

   if($request->has('vertrashregistros')){
    $usuario->revokePermissionTo('ver trashRegistros');
    $usuario->givePermissionTo('ver trashRegistros');
       
   }else{
    $usuario->revokePermissionTo('ver trashRegistros');
   }
   if($request->has('restaurarregistros')){
    $usuario->revokePermissionTo('restaurar registros');
    $usuario->givePermissionTo('restaurar registros');
       
   }else{
    $usuario->revokePermissionTo('restaurar registros');
   }
   if($request->has('restauraractivos')){
    $usuario->revokePermissionTo('restaurar activos');
    $usuario->givePermissionTo('restaurar activos');
       
   }else{
    $usuario->revokePermissionTo('restaurar activos');
   }

//fin permisos

            return redirect()->route('permisos', ['id' => $id]);
     
                }














 function putoff(){

}
function obtenerID(Request $request){
   

}
function select(Request $request)
{
    // $usuarioPermiso = User::find($request->id);
    
}
function findid(Request $request,$id)
{
    $id=user::findOrfail($id);
    // return redirect('home');
    return view('permisos',compact('id'));
}

}
