<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionTorneo extends Model
{
    protected $table = 'configuraciones_torneo';

    protected $fillable = [
        'numeroEquipos',
        'puntosPartidoGanado',
        'puntosPartidoEmpatado',
        'maximoIntegrantesEquipo',
        'maximoIntegrantesJuego',
        'acumularTarjetasAmarillas',
        'tarjetaAzul',
        'disciplina_id',
        'torneo_id',
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
