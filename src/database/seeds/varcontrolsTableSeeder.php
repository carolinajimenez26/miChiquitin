<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contabilidad\Varcontrol;

class varcontrolsTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
          [
            'nombre' => 'iva',
            'descripcion' => 'el iva impuesto por el gobierno',
            'valor' => 0.19
           ],
           [
             'nombre' => 'horas_extras_diurno',
             'descripcion' => 'valor de las horas extras  laboradas en horario diurno',
             'valor' => 3842
            ],
            [
              'nombre' => 'horas_extras_nocturno',
              'descripcion' => 'valor de las horas extras  laboradas en horario nocturno',
              'valor' => 5379
             ],
             [
               'nombre' => 'Hora_extra_diurna_dominicalfestivo',
               'descripcion' => 'valor de las horas extras  laboradas en horario diurno dominical/festivo',
               'valor' => 6148
              ],
              [
              'nombre' => 'Hora_extra_diurna_dominicalfestivo',
              'descripcion' => 'valor de las horas extras  laboradas en horario diurno dominical/festivo',
              'valor' => 7685
             ],
              [
              'nombre' => 'aporte',
            'descripcion' => 'valor en porcentaje de la eps, arl, pensión',
            'valor' => 4
             ],
            [
                'nombre' => 'aux_transporte',
                'descripcion' => 'valor para transporte',
                'valor' => 83140
            ],
            [
                'nombre' => 'efectivo',
                'descripcion' => 'en caja',
                'valor' => 10000000
            ],
        );

        Varcontrol::insert($data);
    }
}
