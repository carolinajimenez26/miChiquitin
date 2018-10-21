<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class permisosContabilidad extends Model
{
    //
    protected $table = 'permisos';
    protected $primaryKey = 'id_user';

    protected $fillable = ['id_user', 'estado'];

    public function empleado(){
        return $this->belongsTo('App\Models\Usuarios\Empleado', 'id_user', 'id_empleado');
    }

}
