@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row mt-4">
            <h2>Especies</h2>
            <!--logica de mensaje para eliminar-->
            @if(session('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>
            @endif
            <div class="input-group gap-2 mb-3 mt-2">
                <form action="{{route('especies.index')}}" method="GET" class="input-group gap-2 mb-3">
                    <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                    <a href="{{route('especies.create')}}" class="btn btn-success">Agregar una nueva especie</a>
                    <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px;">            
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                    <a href="{{route('especies.index')}}" class="btn btn-outline-danger">Borrar</a>
                </form>
            </div>
            
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre Común</td>
                            <td>Nombre Científico</td>
                            <td>Estado de conservación</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Modificar tbody-->
                        @forelse ($especies as $especie )
                            <tr>
                                <td>{{$especie->nombre_comun}}</td>
                                <td>{{$especie->nombre_cientifico}}</td>
                                <td>{{$especie->estado_conservacion}}</td>
                                <td>
                                    <!--mandar la ruta a editar -->
                                    <a href="{{route("especies.edit", $especie->id_especie)}}" class="btn btn-warning btn-sm">
                                        🖊
                                    </a>

                                    <a href="{{route("especies.show", $especie->id_especie)}}" class="btn btn-info btn-sm">
                                        👁
                                    </a>
                                    <form action="{{route("especies.destroy", $especie->id_especie)}}" 
                                        method="post"
                                        onsubmit="return confirm('¿Estás seguro de que se desea eliminar esta especie?')">
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
                                <td colspan="4" class="text-center text-muted py-4">
                                    No hay registros
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!--Botones-->
                {{$especies->links()}}
        </div>
    </div>
@endsection
