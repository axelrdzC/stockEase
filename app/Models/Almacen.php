<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Almacen extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

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

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}
