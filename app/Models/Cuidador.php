<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $table = 'cuidadores';

    protected $primaryKey = 'id_cuidador';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'especialidad',
        'salario'
    ];

    /**Funcion para el muchos a muchos */
    public function habitats()
    {
        return $this->belongsToMany(
            Habitat::class,
            'asignacion_cuidadores',
            'id_cuidador',
            'id_habitat'
        )->withPivot('turno');
    }
}
