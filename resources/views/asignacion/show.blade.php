@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Información del cuidador</h4>
                </div>

                <div class="card-body">                    
                        <div class="mb-3">
                            <label class="form-label">Habitat</label>  
                            <input type="text"
                                   class="form-control"
                                   id="nombre"
                                   value="{{$habitats->firstWhere('id_habitat',$asignacion->id_habitat)->nombre}}" 
                                   readonly>
                        </div>
                      
                        <div class="mb-3">
                            <label class="form-label">Cuidador</label>
                            <input type="text"
                                   class="form-control"
                                   id="nombre"
                                   value="{{$cuidadores->firstWhere('id_cuidador',$asignacion->id_cuidador)->nombre}}"
                                   readonly>                            
                        </div>
                        
                         <div class="mb-3">
                            <label class="form-label">Turno</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="turno"
                                value="{{$asignacion-> turno}}"
                                readonly>
                        </div>

                        
                        <a href="{{route('asignacion.index')}}" type="button" class="btn btn-info me-2">
                            Cancelar
                        </a>

                       
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
