<?php
use Illuminate\Database\Seeder;
class Planpago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_de_pagos')->insert([
            'nombre_plan' => 'Efectivo',
            'cuotas' => '0',
            'interes' => '0',
            'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
            'nombre_plan' => '1 Mes',
            'cuotas' => '1',
            'interes' => '5',
            'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
            'nombre_plan' => '3 Meses',
            'cuotas' => '3',
            'interes' => '5',
            'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
            'nombre_plan' => '6 Meses',
            'cuotas' => '6',
            'interes' => '5',
            'forma_pago' => 'Efectivo'
        ]);
    }
}