<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Almacen;
use App\Models\Producto;
use Livewire\WithPagination;


class HomeAlmacenesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $querito = Almacen::query();

        $almacenes = $querito->paginate(10);

        $almacenes->getCollection()->transform(function ($almacen) {
            $productos = Producto::where('almacen_id', $almacen->id)->get();
            $almacen->porcentaje = $productos->sum('cantidad_producto') / $almacen->capacidad * 100;
            return $almacen;
        });

        return view('livewire.home-almacenes-component', compact('almacenes'));
    }
}
