<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'tipo_identificacion', 'identificacion', 'nombres', 'apellidos', 
        'genero', 'tipo_sangre', 'fecha_nacimiento', 'celular', 
        'ciudad_ubicacion', 'delegacion', 'documento_identidad_path', 
        'documento_adicional_path', 'fotografia_path',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }
    public function tiposParticipacion()
    {
        return $this->belongsToMany(TipoParticipacion::class, 'persona_tipo_participacion', 'persona_id', 'tipo_participacion_id')
                    ->withTimestamps(); // Opcional si quieres guardar los timestamps
    }
}

