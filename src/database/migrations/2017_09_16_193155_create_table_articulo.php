<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->string('id', 100);
			$table->string('nombre');
			$table->string('descripcion');
			$table->decimal('precio_basico', 15,2);
			$table->integer('cantidad');
			$table->integer('id_proveedor')->unsigned();
			$table->date('fecha');
            $table->tinyinteger('borrado');
            $table->timestamps();
			
			$table->primary('id');
			$table->foreign('id_proveedor')->references('id')->on('proveedores');
			// id_proveedor es una llave foranea del id en la tabla proveedores
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
