<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\Animal;
use App\Models\Habitat;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**Paso 2  */
        $animales = Animal::join(
            'especies',
            'animales.id_especie',
            '=',
            'especies.id_especie'
        )
        ->join(
            'habitats',
            'animales.id_habitat',
            '=',
            'habitats.id_habitat'
        )
        ->select(
            'animales.*',
            'especies.nombre_comun as nombre_comun',
            'habitats.nombre as habitat'
        )
        ->get();
        return view("animales.index", compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("animales.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::findOrFail($id);
        return view("animales.edit", compact("animal"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
