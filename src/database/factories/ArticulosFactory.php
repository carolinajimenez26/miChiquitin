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

use App\Models\Inventario\Proveedor;
use App\Models\Inventario\Articulo;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Articulo::class, function (Faker\Generator $faker) {
    $proveedoresIds = Proveedor::all()->pluck('id')->toArray();
    return [
        'id' => $faker->unique()->randomDigitNotNull."",
        'nombre' => $faker->firstName,
        'descripcion' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'precio_basico' => $faker->numberBetween($min = 1000, $max = 9000),
        'cantidad' => $faker->randomDigit,
        'id_proveedor' => $faker->randomElement($proveedoresIds),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
