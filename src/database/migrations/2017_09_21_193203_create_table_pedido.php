<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
    	    $table->string('id_articulo');
    	    $table->integer('id_proveedor')->unsigned();
    	    $table->integer('cantidad');
    	    $table->decimal('costo_total', 15, 2);
    	    $table->date('fecha');
    	    $table->string('estado');
            $table->tinyinteger('borrado')->default('2');
            $table->timestamps();
		
		    $table->foreign('id_articulo')->references('id')->on('articulos');
		    $table->foreign('id_proveedor')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
