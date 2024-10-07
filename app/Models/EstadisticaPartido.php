<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadisticaPartido extends Model
{
    use HasFactory;

    protected $table = 'estadistica_partido';

    protected $fillable = [
        'idPartido',
        'idJugador',
        'tarjetaAzul',
        'numeroCamiseta',
        'tarjetaAmarilla',
        'tarjetaRoja',
        'observacion',
        'puntos',
    ];

    // Relación con el modelo Partido
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'idPartido');
    }

    // Relación con el modelo Persona (jugador)
    public function jugador()
    {
        return $this->belongsTo(Persona::class, 'idJugador');
    }

    // Método para marcar automáticamente tarjeta roja si tarjeta amarilla es 2
    public function setTarjetaAmarillaAttribute($value)
    {
        $this->attributes['tarjetaAmarilla'] = $value;

        if ($value == 2) {
            $this->attributes['tarjetaRoja'] = true;
        }
    }
}
