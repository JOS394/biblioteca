<?php

namespace App\Imports;

use App\categoria;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CategoriasImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new categoria([
            'nom_categoria'=> $row['categoria'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.categoria' => Rule::unique('categorias','nom_categoria'),
            
        ];
    }


}
