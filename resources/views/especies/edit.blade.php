@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar a la especie</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route("especies.update", $especie->id_especie)}}" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label">Nombre común</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_comun"
                                value="{{$especie->nombre_comun}}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre científico</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_cientifico"
                                value="{{$especie->nombre_cientifico}}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado de conservación</label>
                            <!--logica para jalar el estado ya seleccionado-->
                            <select class="form-select" name="estado_conservacion" required>
                                <option value="Vulnerable" @selected($especie->estado_conservacion == 'Vulnerable')>
                                    Vulnerable
                                </option>
                                <option value="Casi amenazado" @selected($especie->estado_conservacion == 'Casi amenazado')>
                                    Casi amenazado
                                </option>
                                <option value="En peligro" @selected($especie->estado_conservacion == 'En peligro')>
                                    En peligro
                                </option>
                                <option value="Preocupación menor" @selected($especie->estado_conservacion == 'Preocupación menor')>
                                    Preocupación menor
                                </option>
                            </select>
                        </div>


                        <div class="d-flex justify-content-end">
                            <a href="{{route('especies.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-warning">
                                Guardar cambios
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
