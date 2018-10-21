<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id_empleado');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_empresa')->unsigned();
            $table->integer('id_contrato')->unsigned();
            $table->string('estado');
            $table->string('cargo');
            $table->string('area');
            $table->integer('numberphone')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresa');
            $table->foreign('id_contrato')->references('id_contrato')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
