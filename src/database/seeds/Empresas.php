<?php

use Illuminate\Database\Seeder;
use App\Models\Usuarios\Empresa;

class Empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empresa::class, 5)->create();
    }
}
