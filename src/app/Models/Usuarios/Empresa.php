<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['nombre', 'direccion','telefono'
    ];

    public function empleados(){
    	return $this->hasMany('App\Models\Usuarios\Empleado');
    }
}
