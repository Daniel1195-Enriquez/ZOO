@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Especies</h2>
                <a href="{{route('crud.index')}}" 
                class="btn btn-danger">Volver</a>
                <a href="{{route('especies.create')}}" class="btn btn-success">Agregar una nueva especie</a>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Estado de conservación</td>
                            <td>Nombre Científico</td>
                            <td>Nombre Común</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Modificar tbody-->
                        @foreach ($especies as $especie )
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        Editar
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$especie->estado_conservacion}}</td>
                                <td>{{$especie->nombre_cientifico}}</td>
                                <td>{{$especie->nombre_comun}}</td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
