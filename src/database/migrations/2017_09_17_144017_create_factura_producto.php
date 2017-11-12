<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_productos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->integer('id_factura')->unsigned(); //->index();
            $table->string('id_articulo', 100); //->index();
            $table->integer('cantidad');
            $table->decimal('precio_venta', 15, 2);
            $table->integer('pendiente');

            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->foreign('id_articulo')->references('id')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_producto');
    }
}
