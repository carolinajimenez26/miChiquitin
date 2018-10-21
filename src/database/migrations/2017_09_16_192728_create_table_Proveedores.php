<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
			$table->string('id_tipo');
			$table->date('fecha');
			$table->string('representante_legal');
			$table->string('id_representante');
			$table->string('telefono');
			$table->string('razon_social');
			$table->string('per_jur');
			$table->string('departamento');
			$table->string('direccion');
			$table->string('ciudad');
            $table->tinyinteger('borrado');
            $table->timestamps();
					
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
