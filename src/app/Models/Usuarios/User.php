<?php

namespace App\Models\Usuarios;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     use softDeletes;
     protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password','id_tipo' ,'tipo_rol', 'apellidos', 'direccion', 'edad', 'credito_maximo','credito_actual',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function empleado(){
        return $this->hasOne('App\Models\Usuarios\Empleado', 'id_usuario');
    }

    public function cliente(){
        return $this->hasOne('App\Models\Usuarios\Cliente');
    }

    public function telefonos(){
        return $this->hasMany('App\Models\Usuarios\Telefono');
    }

    public function facturas(){
        return $this->hasMany('App\Models\Facturacion\Factura');
    }

    public function nominas(){
        return $this->hasMany('App\Models\Contabilidad\Nomina');
    }

    public function deuda(){
        return $this->hasOne('App\Models\Cartera\Deuda','id_usuario');
    }

    public function scopeName($query, $name){ //scope query para reporte por nombre
      if(trim($name)!=""){
        $query->where("name","LIKE","%$name%")->get();
      }
    }

    public function scopeCredito($query, $cre_min,$cre_max){ //query para listar usuarios por un rango de credito
      $query->whereBetween('credito_actual', [$cre_min, $cre_max])->get();
    }

    public function scopeCreditomax($query, $cre_min,$cre_max){ //query para listar usuarios por un rango de credito
      $query->whereBetween('credito_maximo', [$cre_min, $cre_max])->get();
    }

    public function scopeAcceso($query){
      $query->where('last_login','!=',null)->get();
    }
}
