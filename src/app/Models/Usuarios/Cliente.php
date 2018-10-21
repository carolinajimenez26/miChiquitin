<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cliente extends Model
{
    //protected $primaryKey = 'id_cliente';

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_usuario', 'genero', 'ciudad',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }

    public function scopeCiudad($query, $ciudad){  //query para el reporte por ciudad,
      if(trim($ciudad)!=""){
          $query->where("ciudad","LIKE","%$ciudad%")->get();
        }
    }

    public function scopeGenero($query, $genero){ //query para el reporte por genero
      if(trim($genero)!=""){
          $query->where("genero","LIKE","%$genero%")->get();
        }
    }
}
