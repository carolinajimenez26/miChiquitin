<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('fecha');
            $table->integer('id_cliente')->unsigned(); //->index();
            $table->integer('id_plan_pago')->unsigned();
            $table->integer('cuotas')->unsigned()->default(0);
            $table->decimal('valor_cuota', 8, 2)->default(0.0);
            $table->integer('id_vendedor')->unsigned(); //->index();
            $table->decimal('valor_total', 15, 2);
            $table->string('estado', 50);

            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_vendedor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
