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
        'ubicacion',
        'capacidad',
        'img',
    ];
    
    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'almacen_id');
    }
}
