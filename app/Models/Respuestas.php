<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Valoraciones;

class Respuestas extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta_id', 'respuesta', 'entradas'];

    public function pregunta()
    {
        return $this->belongsTo(Preguntas::class);
    }

    // Relación con valoraciones
    public function valoraciones()
    {
        return $this->hasMany(Valoraciones::class, 'idRespuesta');
    }

    // Accesor para obtener la valoración promedio
    public function getValoracionAttribute()
    {
        return $this->valoraciones()->avg('valor') ?? 0;
    }
}
