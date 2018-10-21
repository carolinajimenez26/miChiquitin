<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_orden');
            $table->decimal('valor_pagar', 15, 2);
            $table->integer('id_pedido')->unsigned();
            $table->string('estado')->nullable();
            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_proveedores');
    }
}
