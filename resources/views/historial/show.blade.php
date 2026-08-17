@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Información de la cita médica</h4>
                </div>

                <div class="card-body">                    
                        <div class="mb-3">
                            <label class="form-label">Animal</label>
                            <input type="text"
                                   class="form-control"
                                   name="nombre"
                                   value="{{$animales->firstWhere('id_animal', $historiales->id_animal)->nombre}}"
                                   readonly>                            
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Fecha revision</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                name="fecha_revision"
                                value="{{$historiales->fecha_revision}}"
                                readonly>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Diagnostico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="diagnostico"
                                value="{{$historiales->diagnostico}}"
                                readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Costo</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="costo_atencion"
                                value="{{$historiales->costo_atencion}}"
                                readonly>
                        </div>

                        
                        <a href="{{route('historial.index')}}" type="button" class="btn btn-info me-2">
                            Cancelar
                        </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
