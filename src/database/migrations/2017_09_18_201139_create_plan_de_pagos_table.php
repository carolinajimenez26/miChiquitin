<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_de_pagos', function (Blueprint $table) {
            $table->increments('id_plan_de_pago');
            $table->string('nombre_plan');
            $table->integer('cuotas');
            $table->decimal('interes', 15, 2);
            $table->string('forma_pago');
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
        Schema::dropIfExists('plan_de_pagos');
    }
}
