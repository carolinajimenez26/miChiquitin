<?php

use Illuminate\Database\Seeder;
use App\Models\Cartera\Plan_de_pago;

class PlanDePagos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Plan_de_pago::class, 5)->create();
    }
}
