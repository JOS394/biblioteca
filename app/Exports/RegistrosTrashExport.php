<?php

namespace App\Exports;

use App\registros;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegistrosTrashExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $registros=registros::join('usuarios', 'usuarios.id', '=', 'registros.id_usuario')
        ->select('registros.id','tipo_registro','usuarios.username','id_activo','registros.nom_activo','marca_act','ubicacion_act','encargado_act',
        'categoria_activo','codigo_activo','estado_activo','registros.foto','dominio','descripcion','registros.created_at')
        ->onlyTrashed()->get();
        
        
        return $registros;
    }
    public function headings(): array
    {
        return [
            '#',
            'tipo_registro',
            'usuario',
            'id_activo',
            'nombre_activo',
            'marca',
            'ubicacion',
            'encargado',
            'categoria',
            'codigo',
            'estado del activo',
            'ubicacion_foto',
            'dominio',
            'descripcion',
            'fecha de ingreso',
            'fecha de Actualizacion',
        ];
    }
}
