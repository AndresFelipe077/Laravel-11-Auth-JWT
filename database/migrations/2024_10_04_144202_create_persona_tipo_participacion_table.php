<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTipoParticipacionTable extends Migration
{
    public function up()
    {
        Schema::create('persona_tipo_participacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('tipo_participacion_id')->constrained('tipo_participacions')->onDelete('cascade');
            $table->timestamps(); // Opcional, si quieres controlar la fecha de creación/actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('persona_tipo_participacion');
    }
}
