<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUsuario')->constrained('users')->onDelete('cascade');
            $table->foreignId('idRespuesta')->constrained('respuestas')->onDelete('cascade');
            $table->integer('valor');
            $table->timestamps();

            $table->unique(['idUsuario', 'idRespuesta']); // Para evitar duplicados de valoración por usuario y respuesta
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('valoraciones');
    }
};
