<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipoGrupo extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = []; // Cambié a un array vacío para permitir todos los campos
    protected $table = 'equipoGrupos';

    public function setCreatedAtAttribute($value): void
    {
        date_default_timezone_set("America/Bogota");
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setUpdatedAtAttribute($value): void
    {
        date_default_timezone_set("America/Bogota");
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'idEquipo');
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'idGrupo');
    }

}
