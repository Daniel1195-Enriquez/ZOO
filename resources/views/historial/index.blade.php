@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Historial médico del animal</h2>   
                    <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                    <a href="{{route('historial.create')}}" class="btn btn-success">Agregar un nuevo historial</a>             
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Costo atención</td>                           
                            <td>Fecha de revision</td>
                            <td>Diagnostico</td>
                            <td>Nombre animal</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historiales as $historial)
                            <tr>
                                <td>
                                    <a href=""="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$historial->costo_atencion}}</td>
                                <td>{{$historial->diagnostico}}</td>
                                <td>{{$historial->fecha_revision}}</td>
                                <td>{{$historial->nombre_animal}}</td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
