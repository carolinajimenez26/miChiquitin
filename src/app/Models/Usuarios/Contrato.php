<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id_contrato';
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'tipo', 'salario', 'fecha_inicial', 'fecha_fin',
    ];

    public function empleado(){
    	return $this->hasOne('App\Models\Usuarios\Empleado');
    }
}
