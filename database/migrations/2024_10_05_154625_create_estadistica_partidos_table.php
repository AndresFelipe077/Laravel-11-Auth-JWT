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
        Schema::create('estadistica_partido', function (Blueprint $table) {
            $table->id();
            
            // Relación con el partido
            $table->foreignUuid('idPartido')->references('id')->on('partidos')->onDelete('cascade');
            
            // Relación con la persona (jugador)
            $table->foreignId('idJugador')->constrained('personas')->onDelete('cascade');

            
            // Campos para estadísticas del partido
            $table->boolean('tarjetaAzul')->default(false);
            $table->integer('numeroCamiseta');
            $table->enum('tarjetaAmarilla', [0, 1, 2]);
            $table->boolean('tarjetaRoja')->default(false);
            $table->text('observacion')->nullable();
            $table->integer('puntos')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadistica_partido');
    }
};
