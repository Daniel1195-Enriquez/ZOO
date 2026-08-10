<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';

    protected $primaryKey = 'id_animal';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_especie',
        'id_habitat',
        'fecha_nacimiento',
        'genero',
        'peso_kg'
    ];
}
