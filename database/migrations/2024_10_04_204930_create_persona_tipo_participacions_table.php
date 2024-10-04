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
        Schema::create('personaTipoParticipacion', function (Blueprint $table) {
            // $table->id();
            $table->uuid(column: 'id')->primary();
            $table->foreignUuId('idPersona')->references('id')->on('personas')->onDelete('cascade');
            $table->foreignUuId('idTipoParticipacion')->references('id')->on('tipoParticipacion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_tipo_participacions');
    }
};
