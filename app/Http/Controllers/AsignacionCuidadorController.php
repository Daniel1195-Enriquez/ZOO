<?php

namespace App\Http\Controllers;
/**paso 1 importar modelo */
use Illuminate\Http\Resources;
use App\Models\AsignacionCuidador;
use App\Models\Habitat;
use App\Models\Cuidador;

use Illuminate\Http\Request;

class AsignacionCuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**Paso 2 */
        $buscar = $request->buscar;

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
                'asignacion_cuidadores.id_habitat', /**se pasan los id's */
                'asignacion_cuidadores.id_cuidador', /**por la ruta de edit */
                'asignacion_cuidadores.turno',
                'cuidadores.nombre as nombre_cuidador',
                'habitats.nombre as nombre_habitat'
            )
            ->when($buscar, function ($query) use ($buscar){
                    $query->where('habitats.nombre','like',"%$buscar%")
                          ->orWhere('cuidadores.nombre', 'like',"%$buscar%")
                          ->orWhere('asignacion_cuidadores.turno','like',"%$buscar%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('asignacion.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $habitats = Habitat::all();
        $cuidadores = Cuidador::all();
        return view("asignacion.create", compact("habitats","cuidadores"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AsignacionCuidador::create($request->all());
        return redirect()->route("asignacion.index")->with('success', 'Vinculo Asignado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_habitat, $id_cuidador)
    {
        $asignacion = AsignacionCuidador::where('id_habitat', $id_habitat)
            ->where('id_cuidador',$id_cuidador)
            ->firstOrFail();
        $habitats = Habitat::all();
        $cuidadores = Cuidador::all();
        return view("asignacion.show", compact("asignacion","habitats","cuidadores"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_habitat, $id_cuidador)
    {    
        $asignacion = AsignacionCuidador::where('id_habitat', $id_habitat)
            ->where('id_cuidador',$id_cuidador)
            ->firstOrFail();
        $habitats = Habitat::all();
        $cuidadores = Cuidador::all();
        return view("asignacion.edit", compact("asignacion","habitats","cuidadores"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_habitat, $id_cuidador)
    {
        AsignacionCuidador::where('id_habitat', $id_habitat)
            ->where('id_cuidador', $id_cuidador)
            ->update([
                'id_habitat' => $request->id_habitat,
                'id_cuidador' => $request->id_cuidador,
                'turno' => $request->turno
            ]);

        return redirect()->route('asignacion.index')
            ->with('success', 'Asignación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_habitat, $id_cuidador)
    {
        AsignacionCuidador::where('id_habitat', $id_habitat)
            ->where('id_cuidador', $id_cuidador)
            ->delete();

        return redirect()
            ->route('asignacion.index')
            ->with('success', 'Asignación eliminada correctamente');
    }
    }
