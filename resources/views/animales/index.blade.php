@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Animales</h2>
                <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                <a href="{{route('animales.create')}}" class="btn btn-success">Agregar un nuevo animal</a>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Peso kg</td>
                            <td>Género</td>
                            <td>Fecha de nacimiento</td>
                            <td>Habitat</td>
                            <td>Nombre común</td>
                            <td>Nombre</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!--paso 3 modificar tbody-->
                        @foreach($animales as $animal)
                            <tr>
                                <td>
                                    <a href= {{route("animales.edit", $animal->id_animal) }} class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <a action= {{route("animales.destroy", $animal->id_animal) }} class="btn btn-danger btn-sm" method="post">
                                        Eliminar
                                    </a>
                                </td>
                                <td>{{ $animal->peso_kg }}</td>
                                <td>{{ $animal->genero }}</td>
                                <td>{{ $animal->fecha_nacimiento }}</td>
                                <td>{{ $animal->habitat }}</td>                                
                                <td>{{ $animal->nombre_comun }}</td>
                                <td>{{ $animal->nombre }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection
