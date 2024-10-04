<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
    ];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'equipo_grupo');
    }
}
