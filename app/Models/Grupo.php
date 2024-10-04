<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = [
        'nombreGrupo',
        'cantidadEquipos',
        'torneo_id'
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_grupo');
    }
}
