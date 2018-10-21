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


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inventario\Articulo::class, function (Faker\Generator $faker) {

    $array_articulos = ['Jean_azul(12)', 'Camisa_mangaLarga(14)', 'boxer_decorado(8)', 'Falda_roja(12)', 'Camisa_azul(14)', 'Vestido_blanco(6)', 'Falda_amarilla(8)', 'Pantalon_rojo(10)',
            'Pantaloneta_azul(6)', 'Vestido_verde(10)'];

    $proveedoresIds = Proveedor::all()->pluck('id')->toArray();

    return [
        'id' => $faker->unique()->numberBetween($min = 100, $max = 1000),
        'nombre' => $faker->randomElement($array_articulos),
        'descripcion' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'precio_basico'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 10000, $max = 50000),
        'cantidad' => $faker->numberBetween($min = 10, $max = 50),
        'id_proveedor' => $faker->randomElement($proveedoresIds),
        'fecha' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get())
    ];
});
