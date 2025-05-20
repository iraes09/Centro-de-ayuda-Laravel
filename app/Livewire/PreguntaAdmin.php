<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Preguntas;
use App\Models\Respuestas;

class PreguntaAdmin extends Component
{
    public $respuestas = [];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'respuestas.*' => 'nullable|string',
        ]);
    }

    public function eliminarPregunta($id)
    {
        \App\Models\Preguntas::findOrFail($id)->delete();

        session()->flash("mensaje_$id", 'Pregunta eliminada correctamente.');
    }

    public function enviarRespuesta($preguntaId)
    {
        $this->validate([
            "respuestas.$preguntaId" => 'required|string',
        ]);

        Respuestas::create([
            'pregunta_id' => $preguntaId,
            'respuesta' => $this->respuestas[$preguntaId],
        ]);

        session()->flash("mensaje_$preguntaId", 'Respuesta guardada correctamente.');

        // Limpia solo ese input
        unset($this->respuestas[$preguntaId]);
    }

    public function render()
{
    $preguntas = \App\Models\Preguntas::with('respuesta')->latest()->get();

    return view('livewire.pregunta-admin', [
        'preguntas' => $preguntas,
    ]);
}

}