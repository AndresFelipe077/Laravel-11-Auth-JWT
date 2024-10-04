<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoParticipacionsTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_participacions', function (Blueprint $table) {
            $table->id();
            $table->string('participacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_participacions');
    }
}
