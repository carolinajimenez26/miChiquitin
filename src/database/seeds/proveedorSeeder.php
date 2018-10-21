<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class rootProveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedores')->insert([
        	'id_tipo' 		=> 	'CC',
        	'fecha'		=>_	$faker->dateTimeThisYear($max = 'now', $timezone = null),
        	'representante_legal'	=> 'Sambel',
        	'id_representante'	=>   1088452750,
        	'telefono'	=>	3126439621,
        	'razon_social'	=>	'Subir a 2k',
        	'per_jur'	=>	'Natural',
        	'departamento'		=>	'Risaralda',
        	'ciudad' => 'Pereira',
        	'borrado' => 2
        ]);
    }
}
