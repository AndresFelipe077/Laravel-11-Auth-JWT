<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = 'torneos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_url',
        'fechaInicio',
        'fechaFin'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }

    public function configuracion()
    {
        return $this->hasOne(ConfiguracionTorneo::class);
    }
}

