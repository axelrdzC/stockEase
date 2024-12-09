<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Orden;

class OrdenVentaComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $querito = Orden::query();

        $querito->where('tipo', 'venta') // Filtra por tipo 'compra'
                ->where(function ($query) {
                    $query->where('id', 'like', '%'.$this->search.'%')
                        ->orWhere('fecha', 'like', '%'.$this->search.'%')
                        ->orWhere('total', 'like', '%'.$this->search.'%');
                });

        $ordenes = $querito->paginate(10);

        return view('livewire.orden-venta-component', compact('ordenes'));
    }
}
