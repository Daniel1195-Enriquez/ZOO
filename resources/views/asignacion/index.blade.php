@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Asignación de cuidador</h2>  
                <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                <a href="{{route('asignacion.create')}}" class="btn btn-success">Asignar nuevo cuidador</a>              
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Turno</td>                           
                            <td>Cuidador</td>
                            <td>Habitat</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignaciones as $asignacion)                            
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        Editar
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$asignacion->turno}}</td>                                
                                <td>{{$asignacion->nombre_cuidador}}</td>
                                <td>{{$asignacion->nombre_habitat}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
