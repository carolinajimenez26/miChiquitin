<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id_pago');
            //$table->integer('id_factura_deuda')->unsigned();
            $table->integer('id_deuda')->unsigned();
            $table->decimal('valor', 15, 2);

            //$table->foreign('id_factura_deuda')->references('id_factura_deuda')->on('factura_deudas');
            $table->foreign('id_deuda')->references('id_deuda')->on('deudas');

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
        Schema::dropIfExists('pagos');
    }
}
