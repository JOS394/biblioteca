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
class UsuariosController extends Controller
{
    

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            // $usuarios= DB::table('usuarios')
            // ->select('usuarios.*')
            // ->orderBy('nom_usuario','desc')
            // ->paginate(5);

   
            $usuarios=DB::table('usuarios')
            ->select('id','username','nom_completo','tipo_usuario','created_at','updated_at')
            ->orderBy('username','asc')->paginate(5);

     return view('usuarios.index',compact('usuarios'));

            // $texto=trim($request->get('texto'));
            // $buscar=DB::table('usuarios')
            // ->select('id_usuario','nom_usuario','nom_completo','tipo_usuario')
            // ->where('nom_usuario','LIKE','%'.$texto.'%')->orWhere('nom_completo')->
            // orderBy('nom_usuario','asc')->paginate(6);
            // $datos['usuarios']=usuarios::paginate(5);
            // return view('usuarios.index',$datos);
            // return view('usuarios.index',$datos);
    
    
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            
            return view('usuarios.create');
    
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request){



            $request->validate([
            'username'=>'required|unique:usuarios|min:8|max:40',
            'password' => 'required|required_with:repassword|same:repassword|min:8|max:50',
            'repassword' => 'required|min:8|max:50',
            'nom_completo'=>'required|min:8|max:40'
            ]);



           $usuariosDB = new user;
           $usuariosDB->username = $request->username;
           $usuariosDB->password = Hash::make($request->password);
           $usuariosDB->nom_completo = $request->nom_completo;
           $usuariosDB->tipo_usuario = $request->tipo_usuario;
           if ($request->tipo_usuario==1) {
         

            $usuariosDB->assignRole('admin');
            $usuariosDB->givePermissionTo('ver usuarios');
            $usuariosDB->givePermissionTo('crear usuarios');
            $usuariosDB->givePermissionTo('editar usuarios');
            $usuariosDB->givePermissionTo('eliminar usuarios');
    
            $usuariosDB->givePermissionTo('ver activos');
            $usuariosDB->givePermissionTo('crear activos');
            $usuariosDB->givePermissionTo('editar activos');
            $usuariosDB->givePermissionTo('eliminar activos');
            
            $usuariosDB->givePermissionTo('ver categorias');
            $usuariosDB->givePermissionTo('crear categorias');
            $usuariosDB->givePermissionTo('editar categorias');
            $usuariosDB->givePermissionTo('eliminar categorias');

        
            $usuariosDB->givePermissionTo('ver trashActivos');
            $usuariosDB->givePermissionTo('ver trashRegistros');
   
           

            $usuariosDB->givePermissionTo('ver registros');
            $usuariosDB->givePermissionTo('eliminar registros');
            $usuariosDB->givePermissionTo('restaurar registros');
    
    
            $usuariosDB->givePermissionTo('ver permisos');
            $usuariosDB->givePermissionTo('asignar permisos');
            $usuariosDB->givePermissionTo('editar permisos');
            $usuariosDB->givePermissionTo('quitar permisos');
            $usuariosDB->save();
           }elseif ($request->tipo_usuario==2) {

            $usuariosDB->assignRole('editor');
            $usuariosDB->givePermissionTo('ver activos');
            $usuariosDB->givePermissionTo('crear activos');
            $usuariosDB->givePermissionTo('editar activos');

            $usuariosDB->givePermissionTo('ver categorias');
            $usuariosDB->givePermissionTo('crear categorias');
            $usuariosDB->givePermissionTo('editar categorias');

            $usuariosDB->save();
           }elseif($request->tipo_usuario==3){
            $usuariosDB->assignRole('espectador');
            $usuariosDB->givePermissionTo('ver activos');
            $usuariosDB->givePermissionTo('ver permisos');
            $usuariosDB->givePermissionTo('ver categorias');

            $usuariosDB->save();

           }
           

            return redirect('usuarios')->with('agregado','ok');

            //ya se pueden hacer variables con los datos    
            // $title=request('title');
            // $url=request('url');
            // $description=request('description');
    
            //se validara los datos antes de 
            //ingresarlos a la base de datos(ya no es necesario despues de importar CreateProjectRequest)
            
            // $fields= request()->validate([
    
            //     'title'=> 'required',
            //     'url' => 'required',
            //     'description'=>'required',
            //                              ]);
    
            //se envian los datos a funcion guarded en project
            // return $request->validated();
            
    
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show()
        {     
            return view('usuarios.show');
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id_usuario)
        {
             $usuario=User::findOrfail($id_usuario);
            return view('usuarios.edit',compact('usuario'));
            }



            public function cambiarFoto(Request $request)
            {
                 $id_usuario=Auth::user()->id;
                 $username=Auth::user()->username;
                 $ffoto=Auth::user()->foto;
                 $separador = "uploads/fuser/";
                 $separada = explode($separador, $ffoto);
                 $ubicacion=implode($separada);
                 $usuario=User::findOrfail($id_usuario);
                 if ($request->hasFile('foto')) {
                 Storage::disk('public')->delete($ffoto);
                 $usuario->foto = $request->file('foto')->store('uploads/fuser/'.$username,'public');
                 $usuario->update();
                 return redirect('home')->with('cambiada','ok');
                 }
                return redirect('home')->with('nocambiada','ok');
                }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id_usuario)
        {
        $usuariosDB = User::find($id_usuario);
        $usuariosDB->removeRole('admin');
        $usuariosDB->removeRole('editor');
        $usuariosDB->removeRole('espectador');
        $usuariosDB->username = $request->username;
        $usuariosDB->password = Hash::make($request->password);
        $usuariosDB->nom_completo = $request->nom_completo;
        $usuariosDB->tipo_usuario = $request->tipo_usuario;

        $request->validate([
            'username'=>'required|unique:usuarios,username,'.$usuariosDB->id,
            'password' => 'required|min:8|max:250',
            'repassword' => 'required|min:8|max:250',
            'nom_completo'=>'required|min:8|max:40'
            ]);

        //se eliminan todos los permisos para reescribirlos segun el tipo de usuario que seleccione
        $usuariosDB->revokePermissionTo('ver usuarios');
        $usuariosDB->revokePermissionTo('crear usuarios');
        $usuariosDB->revokePermissionTo('editar usuarios');
        $usuariosDB->revokePermissionTo('eliminar usuarios');

        $usuariosDB->revokePermissionTo('ver activos');
        $usuariosDB->revokePermissionTo('crear activos');
        $usuariosDB->revokePermissionTo('editar activos');
        $usuariosDB->revokePermissionTo('eliminar activos');
        $usuariosDB->revokePermissionTo('restaurar activos');
        
        $usuariosDB->revokePermissionTo('ver trashActivos');
        $usuariosDB->revokePermissionTo('ver trashRegistros');

  


        $usuariosDB->revokePermissionTo('ver categorias');
        $usuariosDB->revokePermissionTo('crear categorias');
        $usuariosDB->revokePermissionTo('editar categorias');
        $usuariosDB->revokePermissionTo('eliminar categorias');


        $usuariosDB->revokePermissionTo('ver permisos');
        $usuariosDB->revokePermissionTo('asignar permisos');
        $usuariosDB->revokePermissionTo('editar permisos');
        $usuariosDB->revokePermissionTo('quitar permisos');



        $usuariosDB->revokePermissionTo('ver registros');
        $usuariosDB->revokePermissionTo('eliminar registros');
        $usuariosDB->revokePermissionTo('restaurar registros');
        
        $usuariosDB->revokePermissionTo('ver massive');
        $usuariosDB->revokePermissionTo('run massive');

        if ($request->tipo_usuario==1) {   
         $usuariosDB->assignRole('admin');


         $usuariosDB->givePermissionTo('ver usuarios');
         $usuariosDB->givePermissionTo('crear usuarios');
         $usuariosDB->givePermissionTo('editar usuarios');
         $usuariosDB->givePermissionTo('eliminar usuarios');
 
         $usuariosDB->givePermissionTo('ver activos');
         $usuariosDB->givePermissionTo('crear activos');
         $usuariosDB->givePermissionTo('editar activos');
         $usuariosDB->givePermissionTo('eliminar activos');
         $usuariosDB->givePermissionTo('restaurar activos');
         

         $usuariosDB->givePermissionTo('ver trashActivos');
         $usuariosDB->givePermissionTo('ver trashRegistros');
     
     
         
 
 
         $usuariosDB->givePermissionTo('ver categorias');
         $usuariosDB->givePermissionTo('crear categorias');
         $usuariosDB->givePermissionTo('editar categorias');
         $usuariosDB->givePermissionTo('eliminar categorias');
 
 
         $usuariosDB->givePermissionTo('ver permisos');
         $usuariosDB->givePermissionTo('asignar permisos');
         $usuariosDB->givePermissionTo('editar permisos');
         $usuariosDB->givePermissionTo('quitar permisos');
 
     
         $usuariosDB->givePermissionTo('ver registros');
         $usuariosDB->givePermissionTo('eliminar registros');
         $usuariosDB->givePermissionTo('restaurar registros');
         
         $usuariosDB->givePermissionTo('ver massive');
         $usuariosDB->givePermissionTo('run massive');

         $usuariosDB->save();


         $vista=view('usuarios/edit',compact('usuario'));
         return redirect('usuarios')->with('editado','ok');
        }elseif ($request->tipo_usuario==2) {
         $usuariosDB->assignRole('editor');


         $usuariosDB->givePermissionTo('ver activos');
         $usuariosDB->givePermissionTo('crear activos');
         $usuariosDB->givePermissionTo('editar activos');

         $usuariosDB->givePermissionTo('ver categorias');
         $usuariosDB->givePermissionTo('crear categorias');
         $usuariosDB->givePermissionTo('editar categorias');

         $usuariosDB->givePermissionTo('ver activos');
         $usuariosDB->givePermissionTo('crear activos');
         $usuariosDB->givePermissionTo('editar activos');

         $usuariosDB->givePermissionTo('ver trashActivos');
         $usuariosDB->givePermissionTo('ver trashRegistros');
         
         $usuariosDB->givePermissionTo('ver registros');
   

         $usuariosDB->save();
         $vista=view('usuarios/edit',compact('usuario'));
         return redirect('usuarios')->with('editado','ok');
        }elseif($request->tipo_usuario==3){
         $usuariosDB->assignRole('espectador');



         $usuariosDB->givePermissionTo('ver activos');
         $usuariosDB->givePermissionTo('ver categorias');
         $usuariosDB->givePermissionTo('ver registros');
         $usuariosDB->givePermissionTo('ver trashActivos');
         $usuariosDB->givePermissionTo('ver trashRegistros');
         $usuariosDB->save();

           return redirect('usuarios')->with('editado','ok');

        }    
        
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id_usuario)
        {
        
        $usuariosDB = User::find($id_usuario);
        $usuariosDB->revokePermissionTo('ver usuarios');
        $usuariosDB->revokePermissionTo('crear usuarios');
        $usuariosDB->revokePermissionTo('editar usuarios');
        $usuariosDB->revokePermissionTo('eliminar usuarios');

        $usuariosDB->revokePermissionTo('ver activos');
        $usuariosDB->revokePermissionTo('crear activos');
        $usuariosDB->revokePermissionTo('editar activos');
        $usuariosDB->revokePermissionTo('eliminar activos');
        $usuariosDB->revokePermissionTo('restaurar activos');
        
        $usuariosDB->revokePermissionTo('ver trashActivos');
        $usuariosDB->revokePermissionTo('ver trashRegistros');
    
        



        $usuariosDB->revokePermissionTo('ver categorias');
        $usuariosDB->revokePermissionTo('crear categorias');
        $usuariosDB->revokePermissionTo('editar categorias');
        $usuariosDB->revokePermissionTo('eliminar categorias');


        $usuariosDB->revokePermissionTo('ver permisos');
        $usuariosDB->revokePermissionTo('asignar permisos');
        $usuariosDB->revokePermissionTo('editar permisos');
        $usuariosDB->revokePermissionTo('quitar permisos');



        $usuariosDB->revokePermissionTo('ver registros');
        $usuariosDB->revokePermissionTo('eliminar registros');
        $usuariosDB->revokePermissionTo('restaurar registros');
        
        $usuariosDB->revokePermissionTo('ver massive');
        $usuariosDB->revokePermissionTo('run massive');

          user::destroy($id_usuario);

            return redirect('usuarios')->with('eliminar','ok');
        }
        // public function buscador(Request $request)
        // {   
        //     $texto= $request->texto;
        //     $usuarios=  usuarios::where("nom_usuario","like",$texto."%")->take(10)->get();
        //     $datos['usuarios']=usuarios::paginate(5); 
        //     return view('usuarios.index',$datos);
        // }
  
    
    
    
    
    }


    

