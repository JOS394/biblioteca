<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class registros extends Model
{
    use SoftDeletes; //Implementamos 


    protected $table  = 'registros';
    protected $dates = ['deleted_at']; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'tipo_registro',
        'id_activo',
        'id_usuario',
        'nom_activo',
        'marca_act',
        'ubicacion_act',
        'encargado_act',
        'categoria_activo',
        'codigo_activo',
        'id_usuario',
        'estado_activo',
        'destinatario',
        'estado_fisico_activo',
        'area',
        'valor_adquisicion',
        'foto',
        'fechaadquisicion',
        'descripcion',
    ];
    public function id_activo()
    {

        return $this->belongsTo(activos::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //      'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    

}
