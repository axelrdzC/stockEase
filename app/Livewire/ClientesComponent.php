<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;
use App\Models\Categoria;

class ClientesComponent extends Component
{
    public $search = '';
    public $order = '';
    public $tipo = '';

    public function render()
    {
        $querito = Cliente::query();

        if($this->tipo) {
            $querito->where('tipo', '=', $this->tipo);
        }

        if ($this->order) {
            $querito->orderBy('nombre', $this->order);
        }

        $querito->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search .  '%')
            ->orWhere('telefono', 'like', '%' . $this->search .  '%')
            ->orWhere('email', 'like', '%' . $this->search .  '%');
        });

        $clientes = $querito->paginate(10);

        $categorias = Categoria::all();

        return view('livewire.clientes-component', compact('clientes', 'categorias'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->order = '';
        $this->tipo = '';
    }
}
