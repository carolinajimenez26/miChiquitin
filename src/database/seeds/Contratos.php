<?php

use Illuminate\Database\Seeder;
use App\Models\Usuarios\Contrato;

class Contratos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contrato::class, 5)->create();
    }
}
