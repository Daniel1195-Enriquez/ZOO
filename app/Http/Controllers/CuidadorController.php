<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\Cuidador;

use Illuminate\Http\Request;

class CuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**Paso 2 */
        $cuidadores = Cuidador::all();
        return view("cuidadores.index",compact(('cuidadores')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cuidadores.create");
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
