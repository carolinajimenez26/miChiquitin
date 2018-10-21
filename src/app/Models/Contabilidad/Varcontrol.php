<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Varcontrol extends Model
{
    use FormAccessible; 
    protected $table = 'varcontrols';

    protected $fillable = ['nombre', 'descripcion', 'valor'];

    public $timestamps = false;
}
