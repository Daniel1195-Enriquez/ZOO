<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Especie;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**Paso 2  */
        $buscar = $request->buscar;
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
        ->when($buscar, function ($query) use ($buscar){
            $query->where('animales.nombre','like',"%$buscar%");
        })
        ->paginate(10)
        ->withQueryString();
        return view("animales.index", compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**declaración de variables para mandarlos llamar con ayuda del modelo */
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view("animales.create", compact("especies","habitats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Animal::create($request->all());
        return redirect()->route("animales.index")->with('success', 'Animal Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::findOrFail($id);
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view("animales.show", compact("animal","especies","habitats"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::findOrFail($id);
        $especies = Especie::all();
        $habitats = Habitat::all();
        return view("animales.edit", compact("animal","especies","habitats"));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'id_especie' => 'required',
            'id_habitat' => 'required',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required',
            'peso_kg' => 'required|numeric',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update($request->all());

        return redirect()
            ->route("animales.index")
            ->with('success', 'Animal actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);

        if (HistorialMedico::where('id_animal', $id)->exists()) {
            return redirect()->route('animales.index')
                ->with('error', 'No puedes eliminar este animal porque tiene registros en su historial médico.');
        }

        $animal->delete();

        return redirect()->route('animales.index')
            ->with('success', 'Animal eliminado con éxito');
    }
}
