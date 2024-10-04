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
        Schema::create('personas', function (Blueprint $table) {
            $table->uuid(column: 'id')->primary();
            $table->enum('tipoIdentificacion', ['TI', 'CC', 'CE']);
            $table->string('identificacion')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->enum('genero', ['M', 'F', 'Otro']);
            $table->string('tipoSangre');
            $table->date('fechaNacimiento');
            $table->string('celular');
            $table->string('ciudadUbicacion');
            $table->string('delegacion');
            $table->string('documentoIdentidadPath')->nullable();
            $table->string('documentoAdicionalPath')->nullable();
            $table->string('fotografiaPath')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
