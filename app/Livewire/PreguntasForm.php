<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Preguntas;

class PreguntasForm extends Component
{
    public $titulo = '';
    public $texto = '';
    public $detalles = '';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'texto' => 'required|string',
        'detalles' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Preguntas::create([
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'detalles' => $this->detalles,
        ]);

        session()->flash('message', 'Pregunta guardada correctamente.');

        $this->reset(); // Limpia los campos del formulario
    }

    public function render()
    {
        return view('livewire.preguntas-form');
    }
}
