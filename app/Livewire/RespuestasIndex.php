<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Respuestas;

class RespuestasIndex extends Component
{
    public $mostrarModal = false;
    public $respuestaSeleccionada;

    public function verDetalles($id)
    {
        $this->dispatch('mostrarModal', $id);
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
        $this->respuestaSeleccionada = null;
    }

    public function render()
{
    $respuestasPorEntradas = Respuestas::with('pregunta')
        ->orderByDesc('entradas')
        ->limit(3)
        ->get();

    $respuestasPorValoracion = Respuestas::with('pregunta', 'valoraciones')
        ->get()
        ->sortByDesc(function ($respuesta) {
            return $respuesta->valoracion;
        })
        ->take(3); // <- Limitar a 3 mejores valoradas

    return view('livewire.respuestas-index', [
        'respuestasPorEntradas' => $respuestasPorEntradas,
        'respuestasPorValoracion' => $respuestasPorValoracion,
    ]);
}

}
