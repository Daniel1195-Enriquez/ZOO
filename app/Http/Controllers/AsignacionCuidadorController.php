<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\AsignacionCuidador;

use Illuminate\Http\Request;

class AsignacionCuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**Paso 2 */
        $asignaciones = AsignacionCuidador::join(
                'cuidadores',
                'asignacion_cuidadores.id_cuidador',
                '=',
                'cuidadores.id_cuidador'
            )
            ->join(
                'habitats',
                'asignacion_cuidadores.id_habitat',
                '=',
                'habitats.id_habitat'
            )
            ->select(
                'asignacion_cuidadores.turno',
                'cuidadores.nombre as nombre_cuidador',
                'habitats.nombre as nombre_habitat'
            )
            ->get();

        return view('asignacion.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("asignacion.create");
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
        //
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
