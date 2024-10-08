<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected $fillable = [
        'nombreDisciplina',
    ];

    public function configuraciones()
    {
        return $this->hasMany(ConfiguracionTorneo::class);
    }
}
