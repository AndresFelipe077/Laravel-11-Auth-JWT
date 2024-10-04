<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoParticipacion extends Model
{
    use HasFactory;

    protected $fillable = ['participacion'];

    // Relación muchos a muchos con Persona
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'persona_tipo_participacion', 'tipo_participacion_id', 'persona_id')
                    ->withTimestamps();
    }
}
