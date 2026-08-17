@extends("layouts.main")
@section("Contenido")

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actulizar a un Animal</h4>
                </div>

                <form action="{{route("animales.update", $animal->id_animal)}}" method="post">
                    <div class="card-body">                        
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="nombre"
                                    name="nombre"
                                    value="{{$animal -> nombre}}"
                                    >                          

                            </div>
                        

                            <div class="mb-3">
                                <label class="form-label">Especie</label>
                                <select class="form-select" name="id_especie">
                                    <option value="">Seleccione una especie</option>
                                        @foreach($especies as $especie)
                                            <option value="{{ $especie->id_especie }}"
                                                @selected($animal->id_especie == $especie->id_especie)>
                                                {{ $especie->nombre_comun }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Habitat</label>                                
                                <select class="form-select" name="id_habitat">
                                    <option value="">Seleccione un habitat</option>
                                    @foreach($habitats as $habitat)
                                        <option value="{{$habitat->id_habitat}}"
                                            @selected($animal->id_habitat == $habitat->id_habitat)>
                                            {{$habitat->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fecha nacimiento</label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    name="fecha_nacimiento"
                                    id='fecha_nacimiento'                                    
                                    value="{{$animal-> fecha_nacimiento}}"
                                    >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Género</label>

                                <select class="form-select" name="genero" id="genero">                                    
                                    <option value="M" {{ $animal->genero == 'M' ? 'selected' : '' }}>
                                        M
                                    </option>
                                    <option value="F" {{ $animal->genero == 'F' ? 'selected' : '' }}>
                                        F
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Peso</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="peso_kg"
                                    step="0.01"
                                    id='peso_kg'                                    
                                    value="{{$animal-> peso_kg}}"
                                    >
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{route('animales.index')}}" type="button" class="btn btn-danger me-2">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Actulizar animal
                                </button>
                            </div>

                        </form>
                    </div>
                </form>
            </div>
            <!--
            
            'id_especie',
            'id_habitat',
            
            
            -->
        </div>
    </div>
</div>
@endsection