<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    // App\Models\Orden.php
    protected $fillable = [
        'nombre',
        'proveedor_id',
        'cliente_id',
        'producto_id',
        'cantidad',
        'estado',
        'fecha',
        'tipo',
        'total'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

}