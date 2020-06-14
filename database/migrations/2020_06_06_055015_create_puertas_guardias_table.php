<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuertasGuardiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puertas_guardias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->comment('Describe si un guardia es asignado o desasignado de la puerta.');
            $table->timestamps();

            // Relación con la tabla usuarios
            $table->unsignedBigInteger('id_usuario')->comment('Id del guardia de turno sobre la puerta');
            $table->foreign('id_usuario')->references('id')->on('users');

            // Relación con la tabla puertas
            $table->unsignedBigInteger('id_puerta')->comment('Id de la puerta que será asignada');
            $table->foreign('id_puerta')->references('id')->on('puertas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puertas_guardias');
    }
}
