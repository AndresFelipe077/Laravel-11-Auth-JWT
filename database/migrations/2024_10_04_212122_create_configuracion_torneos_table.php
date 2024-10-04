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
        Schema::create('configuracionTorneos', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->integer('numeroEquipos');
            $table->integer('puntosPartidoGanado');
            $table->integer('puntosPartidoEmpatado');
            $table->integer('maximoIntegrantesEquipo');
            $table->integer('maximoIntegrantesJuego');
            $table->boolean('acumularTarjetasAmarillas');
            $table->boolean('tarjetaAzul');
            $table->foreignUuId('idDisciplina')->references('id')->on('disciplinas');
            $table->foreignUuId('idTorneo')->references('id')->on('torneos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracionTorneos');
    }
};
