@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Ingresar nuevo Cuidador</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_comun">
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <select class="form-select" name="estado_conservacion">
                                <option value="">Seleccione</option>
                                <option value="Mamíferos Grandes">Mamíferos Grandes</option>
                                <option value="Aves y Reptiles">Aves y Reptiles</option>
                                <option value="Animales Acuáticos">Animales Acuáticos</option>
                                <option value="Insectos y Anfibios">Insectos y Anfibios</option>
                            </select>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Salario</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="nombre_cientifico">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('cuidadores.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar cuidador
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
