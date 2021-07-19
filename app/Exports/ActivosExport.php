<?php

namespace App\Exports;

use App\activos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ActivosExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $activos=activos::join('usuarios', 'usuarios.id', '=', 'activos.id_usuario')
    ->select('activos.id','nom_activo','marca_act','ubicacion_act'
    ,'encargado_act','categoria_activo','codigo_activo','username'
    ,'estado_activo','activos.foto','dominio','descripcion','activos.created_at','activos.updated_at')
    ->orderBy('activos.id','asc')->get();
        return $activos;
    }

    
    public function headings(): array
    {
        return [
            '#',
            'nombre_activo',
            'marca',
            'ubicacion',
            'encargado',
            'categoria',
            'codigo',
            'usuario',
            'estado del activo',
            'ubicacion_foto',
            'dominio',
            'descripcion',
            'fecha de ingreso',
            'fecha de Actualizacion',
        ];
    }
}

