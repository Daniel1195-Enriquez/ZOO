<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */

use App\Models\AsignacionCuidador;
use Illuminate\Http\Resources;
use App\Models\Cuidador;

use Illuminate\Http\Request;

class CuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**Paso 2 */
        $buscar = $request->buscar;

        $cuidadores = Cuidador::when($buscar, function ($query) use ($buscar){
            $query->where('nombre','like',"%$buscar%")
                  ->orWhere('especialidad','like',"%$buscar%")
                  ->orWhere('salario','like',"%$buscar%");
        })
        ->paginate(10)
        ->withQueryString();
        return view("cuidadores.index",compact('cuidadores'));
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
        Cuidador::create($request->all());
        return redirect()->route("cuidadores.index")->with('success', 'Cuidador Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cuidador = Cuidador::findOrFail($id);
        return view("cuidadores.show", compact("cuidador"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cuidador = Cuidador::findOrFail($id);
        return view("cuidadores.edit", compact("cuidador"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cuidador = Cuidador::findOrFail($id);
        $cuidador->update($request->all());
        return redirect()->route("cuidadores.index")->with('success','Cuidador Actulizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuidador = Cuidador::findOrFail($id);
        
        if(AsignacionCuidador::where('id_cuidador', $id)->exists()) {
            return redirect()->route('cuidadores.index')
                ->with('error','No puedes eliminar a este cuidador porque tiene vinculos');
        }
        $cuidador->delete();
        
        return redirect()->route('cuidadores.index')
            ->with('success','Cuidador Eliminado');
    }
}
