@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cuidadores</h2>
                <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                <a href="{{route('cuidadores.create')}}" class="btn btn-success">Agregar un nuevo cuidador</a>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Salario</td>                           
                            <td>Especialidad</td>
                            <td>Nombre</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuidadores as $cuidador)                            
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        Editar
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$cuidador->salario}}</td>
                                <td>{{$cuidador->especialidad}}</td>
                                <td>{{$cuidador->nombre}}</td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
