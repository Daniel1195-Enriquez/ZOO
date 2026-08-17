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
                    <form action="{{route("cuidadores.update", $cuidador->id_cuidador)}}" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre"
                                value={{"$cuidador->nombre"}}>
                        </div>
                      

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <!--logica para jalar la información seleccionada-->
                            <select class="form-select" name="especialidad">                                
                                <option value="Mamíferos Grandes" @selected($cuidador->especialidad == 'Mamíferos Grandes')>
                                    Mamíferos Grandes
                                </option>
                                <option value="Aves y Reptiles" @selected($cuidador->especialidad == 'Aves y Reptiles')>
                                    Aves y Reptiles
                                </option>
                                <option value="Animales Acuáticos" @selected($cuidador->especialidad == 'Animales Acuáticos')>
                                    Animales Acuáticos
                                </option>
                                <option value="Insectos y Anfibios" @selected($cuidador->especialidad == 'Insectos y Anfibios')>
                                    Insectos y Anfibios
                                </option>
                            </select>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Salario</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="salario"
                                value={{"$cuidador->salario"}}>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{route('cuidadores.index')}}" type="button" class="btn btn-danger me-2">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Actualizar cuidador
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
