<?php

namespace App\Models\Cartera;

use Illuminate\Database\Eloquent\Model;

class Plan_de_pago extends Model
{
    protected $table = "plan_de_pagos";

    protected $fillable = ['nombre_plan', 'cuotas', 'valor_cuota', 'interes', 'forma_pago'];

    public function deuda()
    {
    	return $this->hasOne('App\Models\Cartera\Deuda');
    }

    public function factura(){
    	return $this->hasOne('App\Models\Facturacion\Factura');
    }

    public function pago_proveedores(){
    	return $this->hasMany('App\Models\Contabilidad\PagoProveedores');
    }
}
