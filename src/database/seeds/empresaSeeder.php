<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('empresa')->insert([
        'nombre' 		=> 	'michiquitin',
        'telefono' => '34453455',
        'direccion' => 'cra 23 cll 4'
      ]);
    }
}
