<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\HistorialMedico;
use App\Models\Animal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HistorialMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  /**Paso 2 */
        $buscar = $request->buscar;

        $historiales = HistorialMedico::join(
            'animales', 
            'historial_medico.id_animal', 
            '=',
            'animales.id_animal')
            ->select(
                'historial_medico.*',
                'animales.nombre as nombre_animal'
            )
            ->when($buscar, function ($query) use ($buscar){
                $query->where('animales.nombre','like',"%$buscar%")
                      ->orWhere('historial_medico.diagnostico','like',"%$buscar%")
                      ->orWhere('historial_medico.fecha_revision', 'like', "%$buscar%")
                      ->orWhere('historial_medico.costo_atencion','like',"%$buscar%");
            })
            ->paginate(10)
            ->withQueryString();
            /**El paginate nos regresa una paginación de n elementos en lugar de usar get que trae todo*/
            return view('historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animales = Animal::all();
        return view("historial.create", compact("animales"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        HistorialMedico::create($request->all());
        return redirect()->route("historial.index")->with('success', 'Historial Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $historiales = HistorialMedico::findOrFail($id);
        $animales = Animal::all();
        return view("historial.show", compact("historiales","animales"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historiales = HistorialMedico::findOrFail($id);
        $animales = Animal::all();
        return view("historial.edit", compact("historiales","animales"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_animal' => 'required',
            'diagnostico' => 'required|string',
            'fecha_revision' => 'required|date',
            'costo_atencion' => 'required|numeric',
        ]);
        
        $historial = HistorialMedico::findOrFail($id);
        
        $historial->update([
            'id_animal' => $request->id_animal,
            'diagnostico' => $request->diagnostico,
            'fecha_revision' => $request->fecha_revision,
            'costo_atencion' => $request->costo_atencion,
        ]);

        return redirect()
            ->route('historial.index')
            ->with('success','Historial actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $historial = HistorialMedico::findOrFail($id);

        $historial->delete();

        return redirect()
            ->route('historial.index')
            ->with('success', 'Historial eliminado correctamente');
    }
}
