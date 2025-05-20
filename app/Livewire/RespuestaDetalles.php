<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Respuestas;
use App\Models\Valoraciones;
use Illuminate\Support\Facades\Auth;

class RespuestaDetalles extends Component
{
    public $respuestaId;
    public $respuesta;
    public $valorSeleccionado = null;
    public $yaValorado = false;

    protected $listeners = ['mostrarModal'];

    public function mostrarModal($id)
    {
        $respuesta = Respuestas::findOrFail($id);
        $respuesta->increment('entradas');
        $this->respuesta = $respuesta->load('pregunta');
        $this->respuestaId = $id;

        // Verificar si ya valoró esta respuesta
        $this->yaValorado = Valoraciones::where('idUsuario', Auth::id())
                                        ->where('idRespuesta', $id)
                                        ->exists();
    }

    public function aplicarValoracion()
{
    if ($this->yaValorado || is_null($this->valorSeleccionado)) return;

    // Guardar la valoración
    \App\Models\Valoraciones::create([
        'idUsuario' => \Auth::id(),
        'idRespuesta' => $this->respuestaId,
        'valor' => $this->valorSeleccionado,
    ]);

    // Recalcular el promedio y guardarlo en la tabla respuestas
    $respuesta = \App\Models\Respuestas::find($this->respuestaId);
    $respuesta->valoracion = $respuesta->valoraciones()->avg('valor');
    $respuesta->save();

    $this->yaValorado = true;
}


    public function cerrar()
    {
        $this->reset(['respuestaId', 'respuesta', 'valorSeleccionado', 'yaValorado']);
    }

    public function render()
    {
        return view('livewire.respuesta-detalles');
    }
}
