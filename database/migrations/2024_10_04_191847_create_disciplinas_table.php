<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTable extends Migration
{
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreDisciplina');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}

