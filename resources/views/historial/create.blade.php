@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Nueva cita médica</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Id animal</label>
                            <select class="form-select" name="estado_conservacion">
                                <option value="">Seleccione</option>                                
                            </select>
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Fecha revision</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                name="nombre_cientifico">
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Diagnostico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_cientifico">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Costo</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('historial.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar historial
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
