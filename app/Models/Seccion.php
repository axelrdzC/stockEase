<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Seccion extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'secciones';

    protected $fillable = [
        'nombre',
        'capacidad',
        'almacen_id'
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'seccion_id');
    }
}
