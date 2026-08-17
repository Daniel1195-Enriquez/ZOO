@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Ingresar un nuevo Animal</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route("animales.store")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre">
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Especie</label>
                            <select class="form-select" name="id_especie">
                                <option value="">Seleccione una especie</option>
                                <!--Logica para mandar llamar la información de los controladores, seleccionando id y nombre-->
                                @foreach($especies as $especie)
                                    <option value="{{$especie->id_especie}}">
                                        {{$especie->nombre_comun}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Id habitat</label>
                            <select class="form-select" name="id_habitat">
                                <option value="">Seleccione un habitat</option>
                                @foreach($habitats as $habitat)
                                    <option value="{{$habitat->id_habitat}}">
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
                                name="fecha_nacimiento">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <select class="form-select" name="genero">
                                <option value="">Seleccione</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Peso</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="peso_kg"
                                step="0.01"
                                >
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('animales.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar animal
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
