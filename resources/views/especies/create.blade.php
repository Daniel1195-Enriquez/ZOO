@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Ingresar nueva especie</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre común</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_comun"
                                placeholder="Ej. León">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre científico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_cientifico"
                                placeholder="Ej. Panthera leo">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado de conservación</label>
                            <select class="form-select" name="estado_conservacion">
                                <option value="">Seleccione un estado</option>
                                <option value="Vulnerable">Vulnerable</option>
                                <option value="Casi amenazado">Casi amenazado</option>
                                <option value="En peligro">En peligro</option>
                                <option value="Preocupación menor">Preocupación menor</option>
                            </select>
                        </div>


                        <div class="d-flex justify-content-end">
                            <a href="{{route('especies.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar especie
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
