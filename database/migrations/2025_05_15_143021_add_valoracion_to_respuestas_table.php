<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('respuestas', function (Blueprint $table) {
        $table->decimal('valoracion', 5, 2)->default(0)->after('entradas');
    });
}

public function down(): void
{
    Schema::table('respuestas', function (Blueprint $table) {
        $table->dropColumn('valoracion');
    });
}
};
