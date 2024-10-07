<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';
    protected $primaryKey = 'id';
    public $incrementing = false;  // Usamos UUID
    protected $keyType = 'uuid';
    protected $fillable = [
        'idEquipoA', 'idEquipoB', 'idEquipoGanador', 'fechaPartido', 'horaInicial', 'horaFinal', 'estado', 'idArbitro1', 'idArbitro2', 'idArbitro3', 'idEscenario'
    ];

    public function equipoA()
    {
        return $this->belongsTo(Equipo::class, 'idEquipoA');
    }

    public function equipoB()
    {
        return $this->belongsTo(Equipo::class, 'idEquipoB');
    }

    public function equipoGanador()
    {
        return $this->belongsTo(Equipo::class, 'idEquipoGanador');
    }

    public function escenario()
    {
        return $this->belongsTo(Escenario::class, 'idEscenario');
    }

    public function arbitro1()
    {
        return $this->belongsTo(Persona::class, 'idArbitro1');
    }

    public function arbitro2()
    {
        return $this->belongsTo(Persona::class, 'idArbitro2');
    }

    public function arbitro3()
    {
        return $this->belongsTo(Persona::class, 'idArbitro3');
    }
}

