<?php
 
namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	protected $table = "pedidos";
	
	protected $fillable = [ 'id_articulo', 'id_proveedor', 'cantidad', 'costo_total', 'fecha', 'estado','borrado'];
	
	public function proveedor(){
		return $this->belongsTo('App\Models\Inventario\Proveedor', 'id_proveedor');
	}
	
	public function articulo(){
		return $this->belongsTo('App\Models\Inventario\Articulo', 'id_articulo');
	}
    
    public function pago_proveedores(){
    	return $this->hasMany('App\Models\Contabilidad\PagoProveedores');	
    }
}
