<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'id';
    public $incrementing = false;  // Usamos UUID
    protected $keyType = 'uuid';
    protected $fillable = [
        'nombreSede', 'ubicacion'
    ];

    public function escenarios()
    {
        return $this->hasMany(Escenario::class, 'idSede');
    }
}
