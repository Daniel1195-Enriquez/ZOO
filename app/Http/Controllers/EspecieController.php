<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**Paso 1 */
use Illuminate\Http\Resources;
use App\Models\Especie;
use App\Models\Animal;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**Paso 2  */
        $buscar = $request->buscar;

        $especies = Especie::when($buscar, function ($query) use ($buscar){
            $query->where('nombre_comun','like',"%$buscar%")
                  ->orWhere('nombre_cientifico', 'like', "%$buscar%")
                  ->orWhere('estado_conservacion', 'like', "%$buscar%");
        })
        ->paginate(10)
        ->withQueryString();
        return view("especies.index", compact('especies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("especies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Especie::create($request->all());
        return redirect()->route("especies.index")->with('success', 'Especie Guardada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especie = Especie::findOrFail($id);
        return view("especies.show", compact("especie"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $especie = Especie::findOrFail($id);
        return view("especies.edit", compact("especie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $especie = Especie::findOrFail($id);
        $especie->update($request->all());
        return redirect()->route("especies.index")->with('success','Especie actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $especie = Especie::findOrFail($id);

        if (Animal::where('id_especie', $id)->exists()) {
            return redirect()->route('especies.index')
                ->with('error', 'No puedes eliminar esta especie porque tiene vinculos.');
        }

        $especie->delete();

        return redirect()->route('especies.index')
            ->with('success', 'Especie eliminada');
    }
}
