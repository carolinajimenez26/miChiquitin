<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_tipo')->nullable();
            $table->string('tipo_rol');
            $table->string('apellidos');
            $table->string('direccion');
            $table->integer('edad')->unsigned();
            $table->decimal('credito_maximo', 15, 2);
            $table->decimal('credito_actual', 15, 2);
            $table->dateTime('last_login')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
