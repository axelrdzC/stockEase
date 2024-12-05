<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Almacen;
use App\Models\Producto;

class AlmacenesComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $order = '';
    public $capacidad = '';
    public $pais = '';

    public function render()
    {
        $querito = Almacen::query();

        if ($this->pais) {
            $querito->where('pais', '=', $this->pais);
        }

        if ($this->capacidad == 'bajo') {
            $querito->whereRaw('capacidad <= capacidad * 0.25');
        } elseif ($this->capacidad == 'medio') {
            $querito->whereRaw('capacidad > capacidad * 0.25 AND capacidad <= capacidad * 0.50');
        } elseif ($this->capacidad == 'alto') {
            $querito->whereRaw('capacidad > capacidad * 0.50 AND capacidad <= capacidad * 0.75');
        } elseif ($this->capacidad == 'lleno') {
            $querito->whereRaw('capacidad > capacidad * 0.75');
        }

        if ($this->order) {
            $querito->orderBy('nombre', $this->order);
        }


        $querito->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search .  '%')
            ->orWhere('estado', 'like', '%' . $this->search .  '%')
            ->orWhere('ciudad', 'like', '%' . $this->search .  '%')
            ->orWhere('codigo_p', 'like', '%' . $this->search .  '%');
        });

        $almacenes = $querito->paginate(10);

        $almacenes->getCollection()->transform(function ($almacen) {
            $productos = Producto::where('almacen_id', $almacen->id)->get();
            $almacen->porcentaje = $productos->sum('cantidad_producto') / $almacen->capacidad * 100;
            return $almacen;
        });

        return view('livewire.almacenes-component', compact('almacenes'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->order = '';
        $this->capacidad = '';
        $this->pais = '';
    }
}
