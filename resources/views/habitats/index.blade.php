@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Habitats</h2>
                <a href="{{route('crud.index')}}" 
                class="btn btn-danger">Volver</a>
                <a href="{{route('habitats.create')}}"
                class="btn btn-success"> Agregar un nuevo habitat</a>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Capacidad máxima</td>
                            <td>Clima</td>
                            <td>Nombre</td>                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($habitats as $habitat )
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        Editar
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$habitat->capacidad_max}}</td>
                                <td>{{$habitat->clima}}</td>
                                <td>{{$habitat->nombre}}</td>
                                
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
