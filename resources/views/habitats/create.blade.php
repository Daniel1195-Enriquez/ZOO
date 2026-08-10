@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Ingresar nuevo habitat</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre_comun"
                                placeholder="Ej. Polar">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Clima</label>
                            <select class="form-select" name="estado_conservacion">
                                <option value="">Seleccione</option>
                                <option value="Vulnerable">Calido y frio</option>
                                <option value="Frío Extremo">Frío Extremo</option>
                                <option value="Húmedo">Húmedo</option>
                                <option value="Acuático">Acuático</option>
                                <option value="Cálido y Extremo">Cálido y Extremo</option>
                                <option value="Húmedo y Templado">Húmedo y Templado</option>
                                <option value="Cálido y controlado">Cálido y controlado</option>
                                <option value="Frío y seco">Frío y seco</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Capacidad</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="nombre_cientifico"
                                >
                        </div>

                        


                        <div class="d-flex justify-content-end">
                            <a href="{{route('habitats.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar habitat
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
