<?php
use Illuminate\Database\Seeder;
class PlanPago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //$limit = 3;
        //for ($i = 0; $i < $limit; $i++) {
            DB::table("plan_de_pagos")->insert([ //,
            	'nombre_plan' => 'efectivo',
                'cuotas' => '0',
                'valor_cuota' => '0',
                'interes' => '0',
                'forma_pago' => 'efectivo'
            ]);
        //}
    }
}
