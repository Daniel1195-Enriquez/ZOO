<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    protected $table = 'historial_medico';

    protected $primaryKey = 'id_revision';

    public $timestamps = false;

    protected $fillable = [
        'id_animal',
        'fecha_revision',
        'diagnostico',
        'costo_atencion'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal');
    }
}
