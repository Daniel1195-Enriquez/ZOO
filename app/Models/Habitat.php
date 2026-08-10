<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    protected $table = 'habitats';

    protected $primaryKey = 'id_habitat';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'clima',
        'capacidad_max'
    ];

    /*función para el muchos a muchos */
    public function cuidadores()
    {
        return $this->belongsToMany(
            Cuidador::class,
            'asignacion_cuidadores',
            'id_habitat',
            'id_cuidador'
        )->withPivot('turno');
    }
}
