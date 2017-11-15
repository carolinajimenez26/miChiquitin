<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Models\Usuarios\User;
use App\Models\Cartera\Plan_de_pago;
use App\Models\Facturacion\Factura;
use App\Models\Cartera\Deuda;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Deuda::class, function (Faker\Generator $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $planpagosIds = Plan_de_pago::all()->pluck('id_plan_de_pago')->toArray();
    $facturasIds = Factura::all()->pluck('id')->toArray();
    return [
        'id_usuario' => $faker->unique()->randomElement($usersIds),
        'id_plan' => $faker->unique()->randomElement($planpagosIds),
        'id_factura' => $faker->unique()->randomElement($facturasIds),
        'valor_pagado' => 0,
        'valor_a_pagar' => $faker->randomElement($array = array (100000, 150000, 200000)),
        'plazo_credito' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'estado' => "pendiente"
    ];
});
