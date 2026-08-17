@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar la cita médica</h4>
                </div>

                <div class="card-body">
                    <form action="{{route("historial.update", $historiales->id_revision)}}" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label">Animal</label>
                            <select class="form-select" name="id_animal">
                                <option value="">Seleccione un nombre</option>                                
                                @foreach($animales as $animal)
                                    <option value="{{$animal->id_animal}}"
                                        @selected($historiales->id_animal == $animal->id_animal)>
                                        {{$animal->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Fecha revision</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                name="fecha_revision"
                                value="{{$historiales->fecha_revision}}">
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Diagnostico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="diagnostico"
                                value="{{$historiales->diagnostico}}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Costo</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="costo_atencion"
                                value="{{$historiales->costo_atencion}}">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('historial.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar cambios
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
