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


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuarios\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('321654'),
        'id_tipo' => $faker->unique()->rand(100, 1000),
        'apellidos' => $faker->lastname,
        'direccion'=> $faker->address,
        'credito_maximo' => $faker->numberBetween($min = 500000, $max = 10000000),
        'credito_actual' => $faker->numberBetween($min = 500000, $max = 10000000),
        'edad'=> $faker->randomNumber(2),
        'remember_token' => str_random(10),
        'id_tipo'	=>	13442456,
        'tipo_rol'	=>	'root',
        'apellidos'	=>	'root',
        'direccion'	=>	'Pereira',
        'edad'		=>	30,
        'credito_maximo' => 0.00,
        'credito_actual' => 0.00
    ];
});


$factory->define(App\Models\Usuarios\Cliente::class, function (Faker\Generator $faker){
    return [
        'genero' => function(){ $generos=array("Masculino","Femenino");return $generos[rand(0,1)];},
        'ciudad' => $faker->city,
        'id_usuario'=> function () {
            return factory(App\Models\Usuarios\User::class)->create(['tipo_rol' => 'cliente'])->id;
        },
        'numberphone' => function(array $cliente){return factory(App\Models\Usuarios\Telefono::class)->create(['id_usuario'=>$cliente['id_usuario']])->Id_Telefono;}
    ];
});

$factory->define(App\Models\Usuarios\Telefono::class, function (Faker\Generator $faker) {
  return [
        'telefono' => $faker->phoneNumber,

        //'id_usuario'=>random_int(DB::table('users')->min('id'),DB::table('users')->max('id')),

    ];
});

//arreglando errores
$factory->define(App\Models\Usuarios\Empleado::class, function (Faker\Generator $faker) {

    return [
        'estado' => 'activo',
        'cargo' => function(){ $cargos=array("Vendedor","Auxiliar","Cajero");return $cargos[rand(0,2)];},
        'area'=> $faker->jobtitle,
        'id_empresa'=> '1',
        'id_contrato' =>function () {
          return factory(App\Models\Usuarios\Contrato::class)->create()->id_contrato;
        },
        'id_usuario'=>  function () {
          return factory(App\Models\Usuarios\User::class)->create(['tipo_rol' => 'empleado'])->id;
        },
        'numberphone' => function(array $empleado){return factory(App\Models\Usuarios\Telefono::class)->create(['id_usuario'=>$empleado['id_usuario']])->Id_Telefono;}
    ];
});

$factory->define(App\Models\Usuarios\Contrato::class, function (Faker\Generator $faker) {
    return [
      'tipo' => function(){ $cargos=array("Mensual","Anual","Prestaciones");return $cargos[rand(0,2)];},
      'salario'=> $faker->randomNumber(6),//->numberBetween(6,10),
      'fecha_inicial'=> $faker->dateTimeThisYear($max = 'now', $timezone = null),
      'fecha_fin'=> $faker->dateTimeThisMonth($max = 'now', $timezone = null),
    ];
});
