<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegranteEquipo extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['id'];
    protected $table = 'integranteEquipos';

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
}
