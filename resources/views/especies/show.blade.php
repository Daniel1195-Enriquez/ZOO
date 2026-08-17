@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">información de la especie</h4>
                </div>
                <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nombre común</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_comun"
                                value="{{$especie->nombre_comun}}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre científico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_cientifico"
                                value="{{$especie->nombre_cientifico}}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado de conservación</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $especie->estado_conservacion }}"
                                readonly>
                        </div>
                    <a href="{{route("especies.index")}}" class="btn btn-primary">Volver</a>                        
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
