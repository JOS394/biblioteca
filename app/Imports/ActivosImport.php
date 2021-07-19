<?php

namespace App\Imports;

use App\activos;
use App\registros;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ActivosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

      
        return new activos([
            'nom_activo'            => $row['nombre_activo'],
            'marca_act'             => $row['marca'],
            'ubicacion_act'         => $row['ubicacion'],
            'encargado_act'         => $row['encargado'],
            'categoria_activo'      => $row['categoria'],
            'codigo_activo'         => $row['codigo'],
            'id_usuario'            => Auth::user()->id,
            'estado_activo'         => $row['estado'],
            'estado_fisico_activo'  => $row['estado_fisico'],
            'area'                  => $row['area'],
            'foto'                  => $row['ubicacion_foto'],
            'destinatario'          => $row['destinatario'],
            'valor_adquisicion'     => $row['valor_adquisicion'],
            'fechaadquisicion'      => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'] )),
            'descripcion'           => $row['descripcion'],
        ]);

           


    }
}
