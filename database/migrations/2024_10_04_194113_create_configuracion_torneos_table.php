<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionesTorneoTable extends Migration
{
    public function up()
    {
        Schema::create('configuraciones_torneo', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroEquipos');
            $table->integer('puntosPartidoGanado');
            $table->integer('puntosPartidoEmpatado');
            $table->integer('maximoIntegrantesEquipo');
            $table->integer('maximoIntegrantesJuego');
            $table->boolean('acumularTarjetasAmarillas');
            $table->boolean('tarjetaAzul');
            $table->foreignId('disciplina_id')->constrained('disciplinas');
            $table->foreignId('torneo_id')->constrained('torneos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuraciones_torneo');
    }
}
