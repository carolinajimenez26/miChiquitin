<?php

namespace App\Models\Facturacion;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //protected $primaryKey ='id';

    protected $table = 'facturas';

    protected $fillable = ['fecha', 'id_cliente', 'id_plan_pago', 'cuotas', 'valor_cuota', 'id_vendedor', 'valor_total', 'estado'];

    public function factura_productos() {
      return $this->hasMany('App\Models\Facturacion\Factura_Producto');
    }

    public function factura_deuda() {
        return $this->hasOne('App\Models\Facturacion\FacturaDeuda');
    }

    public function deuda(){
        return $this->hasOne('App\Models\Cartera\Deuda','id_factura');
    }

    public function clientes() {
       return $this->belongsTo('App\Models\Usuarios\User');
    }
    
    public function vendedor() {
       return $this->belongsTo('App\Models\Usuarios\User');
    }

    public function plan_de_pago(){
        return $this->belongsTo('App\Models\Cartera\Plan_de_pago');
    }
}
