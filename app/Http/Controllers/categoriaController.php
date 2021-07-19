<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;

use Illuminate\Support\Facades\DB;
class categoriaController extends Controller
{
   
    public function index(Request $request)
    {

        $categorias=categoria::select('id','nom_categoria','descripcion','created_at','updated_at')->get();

 return view('categorias.index',compact('categorias'));




    }

    public function store(Request $request){



        $request->validate([
            'nom_categoria'   => 'required|string|min:4|max:25',
            'descripcion'     => 'required|min:2'
            ]);




        $categoriaDB = new categoria;
        $categoriaDB->nom_categoria = $request->nom_categoria;
        $categoriaDB->descripcion = $request->descripcion;
        $categoriaDB->save();
         return redirect('categorias')->with('agregado','ok');

     }

     public function crearcategoria(Request $request){

        $categoriaDB = new categoria;
        $categoriaDB->nom_categoria = $request->nom_categoria;
        $categoriaDB->descripcion = $request->descripcion;
     
        $categoriaDB->save();
         return  redirect()->back()->with('agregado','ok');

     }



     public function create()
     {
         
         return view('categorias.create');
 
     }

     public function edit($id_categoria)
     {
         

          $categoria=categoria::findOrfail($id_categoria);
         return view('categorias.edit',compact('categoria'));
         }


         public function update(Request $request, $id_categoria)
         {
 

            
        $request->validate([
            'nom_categoria'   => 'required|string|min:4|max:25',
            'descripcion'     => 'required|min:2'
            ]);

            $categoriaDB = categoria::find($id_categoria);
            $categoriaDB->nom_categoria = $request->nom_categoria;
            $categoriaDB->descripcion = $request->descripcion;
            $categoriaDB->save();
            $vista=view('categorias/edit',compact('categoria'));
            return redirect('categorias')->with('editado','ok');
         }


     public function destroy($id_categoria)
     {
         categoria::destroy($id_categoria);
         return redirect('categorias')->with('eliminar','ok');
     }


}
