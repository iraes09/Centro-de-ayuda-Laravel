<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoraciones extends Model
{
    use HasFactory;

    protected $table = 'valoraciones';

    protected $fillable = [
        'idUsuario',
        'idRespuesta',
        'valor',
    ];

    // Relación con el usuario que hizo la valoración
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    // Relación con la respuesta valorada
    public function respuesta()
    {
        return $this->belongsTo(Respuestas::class, 'idRespuesta');
    }
}
