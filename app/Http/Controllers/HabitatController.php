<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\Habitat;
use App\Models\Animal;

use Illuminate\Http\Request;

class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**Paso 2 */
        $buscar = $request->buscar; 

        $habitats = Habitat::when($buscar, function ($query) use ($buscar){
            $query->where('nombre','like',"%$buscar%")
                  ->orWhere('clima','like', "%$buscar%")
                  ->orWhere('capacidad_max','like', "%$buscar%");
        })
        ->paginate(10)
        ->withQueryString();
        return view("habitats.index", compact('habitats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //vista para el create
        return view("habitats.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Habitat::create($request->all());
        return redirect()->route("habitats.index")->with('success', 'Habitat Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $habitat = Habitat::findOrFail($id);
        return view("habitats.show", compact("habitat"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $habitat = Habitat::findOrFail($id);
        return view("habitats.edit", compact("habitat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $habitat = Habitat::findOrFail($id);
        $habitat->update($request->all());
        return redirect()->route("habitats.index")->with('success','Habitat actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $habitat = Habitat::findOrFail($id);
        if (Animal::where('id_habitat', $id)->exists()) {
            return redirect()->route('habitats.index')
                ->with('error','No puedes eliminar este habitat porque tiene vínculos.');
        }

        $habitat->delete();
        return redirect()->route('habitats.index')
            ->with('success','Habitat eliminado');
    }
}
