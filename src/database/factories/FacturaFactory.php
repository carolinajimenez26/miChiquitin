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

use App\Models\Facturacion\Factura;
use App\Models\Usuarios\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Factura::class, function (Faker\Generator $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $cliente = $faker->randomElement($usersIds);
    $vendedor = $faker->randomElement($usersIds);
    while ($vendedor == $cliente) { // deben ser diferentes
      $vendedor = $faker->randomElement($usersIds);
    }
    return [
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'id_cliente' => $cliente,
        'id_plan_pago' => $faker->unique()->randomDigitNotNull,
        'cuotas' => 0,//$faker->randomElement($array = array (1, 2, 3)),
        'id_vendedor' => $vendedor,
        'valor_total' => $faker->numberBetween($min = 100000, $max = 500000),
        'estado' => ''
    ];
});
