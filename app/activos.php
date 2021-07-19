<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class activos extends Model
{
    use SoftDeletes; //Implementamos 
    protected $table  = 'activos';
    protected $dates = ['deleted_at']; //Registramos la nueva columna

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
    public function id_usuario()
    {

        return $this->belongsTo(usuarios::class);
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
