<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Almacen;

class AlmacenFilter extends Component
{
    public $filter_pais;
    public $filter_estado;
    public $filter_ciudad;
    public $sort_order = 'asc';
    public $almacenes;

    public function mount()
    {
        $this->almacenes = Almacen::all();
    }

    public function updated($propertyName)
    {
        $this->filter();
    }

    public function filter()
    {
        $query = Almacen::query();

        if ($this->filter_pais) {
            $query->where('pais', $this->filter_pais);
        }

        if ($this->filter_estado) {
            $query->where('estado', $this->filter_estado);
        }

        if ($this->filter_ciudad) {
            $query->where('ciudad', $this->filter_ciudad);
        }

        $query->orderBy('nombre', $this->sort_order);

        $this->almacenes = $query->get();
    }

    public function render()
    {
        return view('livewire.almacen-filter');
    }
}