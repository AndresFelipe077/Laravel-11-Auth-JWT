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
        Schema::create('equipoGrupos', function (Blueprint $table) {
            $table->foreignUuid('idGrupo')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreignUuid('idEquipo')->references('id')->on('equipos')->onDelete('cascade');
            $table->primary(['idGrupo', 'idEquipo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_grupos');
    }
};
