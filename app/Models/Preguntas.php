<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'texto', 'detalles'];

    public function respuesta()
{
    return $this->hasOne(\App\Models\Respuestas::class, 'pregunta_id');
}
}
