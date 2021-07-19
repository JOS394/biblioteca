<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_activo','100');
            $table->string('marca_act','15')->nullable();
            $table->string('ubicacion_act','60');
            $table->string('encargado_act','100');
            $table->string('categoria_activo','25')->nullable();
            $table->String('codigo_activo','20')->nullable();
            $table->biginteger('id_usuario')->unsigned()->nullable();
            $table->string('estado_activo','20');
            $table->string('destinatario','40')->nullable();
            $table->string('estado_fisico_activo','20')->nullable();
            $table->string('area','12');
            $table->double('valor_adquisicion')->nullable();
            $table->string('foto','250')->nullable();         
            $table->text('descripcion');
            $table->date('fechaadquisicion')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activos');
    }
}
