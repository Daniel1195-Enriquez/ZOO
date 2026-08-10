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
                            <label class="form-label">Id Especie</label>
                            <select class="form-select" name="">
                                <option value="">Seleccione</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Id habitat</label>
                            <select class="form-select" name="">
                                <option value="">Seleccione</option>
                            </select>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Fecha nacimiento</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                name="nombre_cientifico">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <select class="form-select" name="">
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
                                name="nombre_cientifico"
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
