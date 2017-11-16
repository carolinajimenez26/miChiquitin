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
use App\Models\Cartera\Plan_de_pago;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Plan_de_pago::class, function (Faker\Generator $faker) {

    return [
        'nombre_plan' => "",
        'cuotas' => 0,
        'valor_cuota' => 0,
        'interes' => 0,
        'forma_pago' => ""
    ];
});
