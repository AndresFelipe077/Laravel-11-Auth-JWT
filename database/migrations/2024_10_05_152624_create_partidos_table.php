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
        Schema::create('partidos', function (Blueprint $table) {
            if (!Schema::hasTable('partidos')) {
                $table->uuid('id')->primary();
                $table->foreignUuid('idEquipoA')->references('id')->on('equipos');
                $table->foreignUuid('idEquipoB')->references('id')->on('equipos');
                $table->foreignUuid('idEquipoGanador')->nullable()->references('id')->on('equipos');
                $table->date('fechaPartido');
                $table->time('horaInicial');
                $table->time('horaFinal')->nullable();
                $table->enum('estado', ['pendiente', 'en curso', 'finalizado']);
                $table->foreignUuid('idArbitro1')->nullable()->references('id')->on('personas');
                $table->foreignUuid('idArbitro2')->nullable()->references('id')->on('personas');
                $table->foreignUuid('idArbitro3')->nullable()->references('id')->on('personas');
                $table->foreignUuid('idEscenario')->references('id')->on('escenarios');
                $table->timestamps();
            }
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
