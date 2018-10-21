<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->increments('id_deuda');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_plan')->unsigned();
            $table->integer('id_factura')->unsigned();
            $table->decimal('valor_pagado', 15, 2);
            $table->decimal('valor_a_pagar');
            $table->date('plazo_credito');
            $table->string('estado');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_plan')->references('id_plan_de_pago')->on('plan_de_pagos');
            $table->foreign('id_factura')->references('id')->on('facturas');

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
        Schema::dropIfExists('deudas');
    }
}
