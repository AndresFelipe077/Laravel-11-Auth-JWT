<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_identificacion', ['TI', 'CC', 'CE']);
            $table->string('identificacion')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->enum('genero', ['M', 'F', 'Otro']);
            $table->string('tipo_sangre');
            $table->date('fecha_nacimiento');
            $table->string('celular');
            $table->string('ciudad_ubicacion');
            $table->string('delegacion');
            $table->string('documento_identidad_path')->nullable();
            $table->string('documento_adicional_path')->nullable();
            $table->string('fotografia_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
