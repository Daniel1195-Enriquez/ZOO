<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**Paso 1 */
use Illuminate\Http\Resources;
use App\Models\Especie;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         /**Paso 2  */
        $especies = Especie::all();

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
