@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar cuidador</h4>
                </div>

                <div class="card-body">
                    <form action="{{route("asignacion.update", [
                        'id_habitat' => $asignacion->id_habitat,
                        'id_cuidador' => $asignacion->id_cuidador
                    ]) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label">Habitat</label>                            
                             <select class="form-select" name="id_habitat">
                                <option value="">Seleccione un habitat</option>
                                @foreach($habitats as $habitat)
                                    <option value="{{$habitat->id_habitat}}"
                                        @selected($asignacion->id_habitat == $habitat->id_habitat)>
                                        {{$habitat->nombre}}
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>
                      
                        <div class="mb-3">
                            <label class="form-label">Cuidador</label>
                            <select class="form-select" name="id_cuidador">
                                <option value="">Seleccione a un cuidador</option>

                                @foreach($cuidadores as $cuidador)
                                    <option value="{{ $cuidador->id_cuidador }}"
                                        @selected($asignacion->id_cuidador == $cuidador->id_cuidador)>
                                        {{ $cuidador->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                         <div class="mb-3">
                            <label class="form-label">Turno</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="turno"
                                value="{{$asignacion-> turno}}">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('asignacion.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar asignación
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
