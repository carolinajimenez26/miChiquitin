<?php

use Illuminate\Database\Seeder;
use App\Models\Usuarios\Empleado;

class Empleados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empleado::class, 5)->create();
    }
}
