<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Respuestas;

class BuscadorProblemas extends Component
{
    public $busqueda = '';
    public $resultados = [];

    public function buscar()
    {
        $this->resultados = Respuestas::whereHas('pregunta', function ($query) {
            $query->where('titulo', 'like', '%' . $this->busqueda . '%');
        })
        ->with('pregunta')
        ->get();
    }

    public function verDetalles($id)
    {
        $this->dispatch('mostrarModal', $id);
    }

    public function render()
    {
        return view('livewire.buscador-problemas');
    }
}
