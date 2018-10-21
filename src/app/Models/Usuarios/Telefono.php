<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Telefono extends Model
{
    protected $table = 'telefono';
    protected $primaryKey = 'id_usuario';
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_usuario', 'telefono'];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }
}
