<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaDeuda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_deuda', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();

            $table->integer('id_factura')->unsigned();
            $table->decimal('abono', 15, 2);
            $table->date('fecha');
            $table->time('hora');

            $table->foreign('id_factura')->references('id')->on('facturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_deuda');
    }
}
