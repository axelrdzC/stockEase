<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Almacen extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'almacenes';

    protected $fillable = [
        'nombre',
        'pais',
        'estado',
        'ciudad',
        'colonia',
        'codigo_p',
        'seccion',
        'capacidad',
        'img'
    ];
    
}