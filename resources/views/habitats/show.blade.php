@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Información del habitat</h4>
                </div>

                <div class="card-body">
                    <!--Cambiar a la ruta de update-->
                    
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre"
                                value="{{$habitat->nombre}}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Clima</label>
                            <!--logica para solo jalar y leer la información-->
                            <input 
                                type="text"
                                class="form-control"
                                name=clima
                                value="{{$habitat->clima}}"
                                readonly>                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Capacidad</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="capacidad_max"
                                value="{{$habitat->capacidad_max}}"
                                readonly>
                        </div>                      

                        <a href="{{route("habitats.index")}}" class="btn btn-primary">Volver</a>

                   
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
