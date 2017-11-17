<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class nomina extends Model
{
    //
    protected $table = 'nominas';

    protected $fillable = ['fecha_pago', 'fecha_prenomina', 'base', 'horas_extras', 'salud', 'pension', 'aux_transporte', 'neto', 'id_empleado', 'arl', 'estado',
	];

	public function users(){
		return $this->hasMany('App\Models\Usuarios\User');
	}

}
