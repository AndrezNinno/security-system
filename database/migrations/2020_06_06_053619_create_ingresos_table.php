<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->comment('En esta columna se guarda si INGRESA o SALE');
            $table->string('temperatura')->comment('Se guardará la temperatura con la que ingresa el visitante');
            $table->timestamps();

            // Relación con la tabla usuarios
            $table->unsignedBigInteger('id_usuario')->comment('Id del usuario que está por ingresar o salir');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
