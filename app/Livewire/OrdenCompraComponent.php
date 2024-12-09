<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Orden;

class OrdenCompraComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $querito = Orden::query();

        $querito->where(function ($query){
            $query->where('numero_orden', 'like', '%'.$this->search.'%')
            ->orWhere('fecha', 'like', '%'.$this->search.'%')
            ->orWhere('total', 'like', '%'.$this->search.'%');
        });

        $ordenes = $querito->paginate(10);

        return view('livewire.orden-compra-component', compact('ordenes'));
    }
}
