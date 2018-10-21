<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
	protected $table = "articulos";
	
	protected $fillable = [ 'id', 'nombre', 'descripcion', 'precio_basico', 'cantidad', 'id_proveedor', 'fecha', 'borrado'];
	
	public function proveedor(){
		return $this->belongsTo('App\Models\Inventario\Proveedor');
	}
	
	public function pedidos(){
		return $this->hasMany('App\Models\Inventario\Pedido');

	}

	public function factura_producto(){
		return $this->hasOne('App\Models\Facturacion\Factura_producto');
	}

}
