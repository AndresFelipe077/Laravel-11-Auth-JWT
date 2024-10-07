<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    protected $table = 'escenarios';
    protected $primaryKey = 'id';
    public $incrementing = false;  // Usamos UUID
    protected $keyType = 'uuid';
    protected $fillable = [
        'nombreEscenario', 'descripcion', 'idSede'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'idSede');
    }
}
