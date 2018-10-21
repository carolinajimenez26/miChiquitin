<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_prenomina');
            $table->decimal('horas_extras', 15, 2)->nullable();
            $table->decimal('base', 15, 2);
            $table->decimal('salud', 15, 2)->nullable();
            $table->decimal('pension', 15, 2)->nullable();
            $table->decimal('aux_transporte', 15, 2)->nullable();
            $table->decimal('neto', 15, 2);
            $table->decimal('arl', 15, 2)->nullable();
            $table->integer('id_empleado')->unsigned();
            $table->string('estado')->nullable();
            $table->timestamps();

            //$table->foreign('id_empleado')->references('id')->on('empleados');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominas');
    }
}
