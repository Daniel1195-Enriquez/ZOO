<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionCuidador extends Model
{
    protected $table = 'asignacion_cuidadores';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = null;

    protected $fillable = [
        'id_habitat',
        'id_cuidador',
        'turno'
    ];
}
