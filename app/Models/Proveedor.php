<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Proveedor extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'telefono',
        'id_categoria',
        'direccion',
        'email',
        'img',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function productos() {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }
    
}