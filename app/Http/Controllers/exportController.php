<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\registros;
use App\activos;
use App\categoria;
use App\Exports\ActivosExport;
use App\Exports\ActivosTrashExport;
use App\Exports\RegistrosTrashExport;
use App\Imports\ActivosImport;
use App\Imports\CategoriasImport;
use App\Imports\RegistrosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class exportController extends Controller
{
public function ActivosexportExcel (){

return Excel::download(new ActivosExport, 'activos-list.xlsx');
}

public function ActivosTrashExport (){

    return Excel::download(new ActivosTrashExport, 'activos-Trash-list.xlsx');
    }

    public function RegistrosTrashExport (){

        return Excel::download(new RegistrosTrashExport, 'registros-Trash-list.xlsx');
        }
    

public function ActivosexportPDF (){
    $activos=activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
    ->select('activos.id','nom_activo','marca_act','ubicacion_act'
    ,'encargado_act','categoria_activo','codigo_activo','username'
    ,'estado_activo','activos.foto','dominio','descripcion','activos.created_at','activos.updated_at')
    ->orderBy('activos.id','asc')->get();

    $pdf= PDF::loadView('pdf.activospdf',compact('activos'))->setPaper('legal', 'landscape');

return $pdf->download('activos-list.pdf');
    }
    
public function ActivosimportExcel (Request $request){

    if ($request->hasFile('file')) {
   $file = $request->file('file');

  
   Excel::import(new ActivosImport,$file);
   Excel::import(new RegistrosImport,$file);

   return back()->with('mensaje','Importacion de Datos Completada ');
    }else{
        return back()->with('mensaje','no se agrego ningun archivo para importar');
        $mensaje="";
    }
 
}




}


