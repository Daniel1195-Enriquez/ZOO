@extends("layouts.main")

@section("Contenido")
    <div class="container mt-4">
        <div class="row">
            <h2>Animales</h2>
            @if (session('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>                
            @endif
            <div class="input-group gap-2 mb-3"> <!--gap -2 me da un espacio entre componentes-->
                <form action="{{route('animales.index')}}" method="GET" class="input-group gap-2 mb-3">
                    <a href="{{route('crud.index')}}" class="btn btn-danger" >Volver</a>
                    <a href="{{route('animales.create')}}" class="btn btn-success ">Agregar un nuevo animal</a>
                    <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px;">
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                    <a href="{{route('animales.index')}}" class="btn btn-outline-danger">Borrar</a>
                </form>

            </div>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Especie</td>
                            <td>Habitat</td>
                            <td>Fecha de nacimiento</td>
                            <td>Género</td>
                            <td>Peso kg</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!--paso 3 modificar tbody-->
                        @forelse($animales as $animal)
                            <tr>
                                
                                <td>{{ $animal->nombre }}</td>
                                <td>{{ $animal->nombre_comun }}</td>
                                <td>{{ $animal->habitat }}</td>                                
                                <td>{{ $animal->fecha_nacimiento }}</td>
                                <td>{{ $animal->genero }}</td>
                                <td>{{ $animal->peso_kg }}</td>
                                <td>
                                    <a href= {{route("animales.edit", $animal->id_animal) }} class="btn btn-warning btn-sm">
                                        🖊
                                    </a>

                                    <a href="{{route("animales.show", $animal->id_animal) }}" class="btn btn-info btn-sm">
                                        👁
                                    </a>   

                                    <form action="{{route("animales.destroy", $animal->id_animal)}}"
                                        method="post"
                                        onsubmit="return confirm('¿Estás seguro de eliminar a este animal?')">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger btn-sm">
                                            🗑
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No hay registros
                                </td>
                            </tr>
                        
                        @endforelse                        
                    </tbody>
                </table>  
                <!--Botones-->          
                {{$animales->links()}}
        </div>
    </div>
@endsection
