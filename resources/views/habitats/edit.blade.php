@extends("layouts.main")

@section("Contenido")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar un habitat</h4>
                </div>

                <div class="card-body">
                    <!--Cambiar a la ruta de update-->
                    <form action="{{ route("habitats.update", $habitat->id_habitat)}}" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre"
                                value="{{$habitat->nombre}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Clima</label>
                            <!--logica para jalar el estado ya seleccionado-->
                            <select class="form-select" name="clima">
                                <option value="">
                                    Seleccione
                                </option>
                                <option value="Calido y frio" @selected($habitat->clima == 'Calido y frio')>
                                    Calido y frio
                                </option>
                                <option value="Frío Extremo" @selected($habitat->clima == 'Frío Extremo')>
                                    Frío Extremo
                                </option>
                                <option value="Húmedo"  @selected($habitat->clima == 'Húmedo')>
                                    Húmedo
                                </option>
                                <option value="Acuático" @selected($habitat->clima == 'Acuático')>
                                    Acuático
                                </option>
                                <option value="Cálido y Extremo" @selected($habitat->clima == 'Cálido y Extremo')>
                                    Cálido y Extremo
                                </option>
                                <option value="Húmedo y Templado" @selected($habitat->clima == 'Húmedo y Templado')>
                                    Húmedo y Templado
                                </option>
                                <option value="Cálido y controlado" @selected($habitat->clima == 'Cálido y controlado')>
                                    Cálido y controlado
                                </option>
                                <option value="Frío y seco" @selected($habitat->clima == 'Frío y seco')>
                                    Frío y seco
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Capacidad</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="capacidad_max"
                                value="{{$habitat->capacidad_max}}">
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
