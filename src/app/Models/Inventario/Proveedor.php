<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table = "proveedores";
	
	protected $fillable = [ 'id_tipo', 'fecha' ,'representante_legal', 'id_representante', 'telefono', 'razon_social', 'per_jur', 'departamento', 'direccion', 'ciudad', 'borrado'];
	
	public function articulos(){
		return $this->hasMany('App\Models\Inventario\Articulo');
	}
	
	public function pedidos(){
		return $this->hasMany('App\Models\Inventario\Pedido');
	}

}
