@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar al cuidador</h4>
                </div>

                <div class="card-body">
                    <!--Cambiar ruta a update-->
                    
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre"
                                value={{"$cuidador->nombre"}}
                                readonly>
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <!--logica para jalar la información y solo leerla-->
                            <input 
                                type="text"
                                class="form-control"
                                name="especialidad"
                                value={{"$cuidador->especialidad"}}
                                readonly>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Salario</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="salario"
                                value={{"$cuidador->salario"}}
                                readonly>
                        </div>

                        
                        <a href="{{route('cuidadores.index')}}" type="button" class="btn btn-info me-2">
                            Volver
                        </a>
                        

                    
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
