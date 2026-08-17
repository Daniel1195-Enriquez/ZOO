@extends("layouts.main")

@section("Contenido")
    <div class="container mt-4">
        <div class="row">
            <h2>Historial médico del animal</h2>   
            <div class="input-group gap-2 mb-3">
                    <form action="{{ route('historial.index') }}" method="GET" class="input-group gap-2 mb-3">
                        <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                        <a href="{{route('historial.create')}}" class="btn btn-success">Agregar un nuevo historial</a>             
                        <!--implementación para buscar mediante el input y el botón-->
                        <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px;">
                        <button type="submit" class="btn btn-outline-success">Buscar</button>
                        <a href="{{route('historial.index')}}" class="btn btn-outline-danger">Borrar</a>
                    </form>
            </div>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre animal</td>
                            <td>Diagnostico</td>
                            <td>Fecha de revision</td>
                            <td>Costo atención</td>                           
                            <td>Acciones</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($historiales as $historial)
                            <tr>
                                <td>{{$historial->nombre_animal}}</td>
                                <td>{{$historial->diagnostico}}</td>
                                <td>{{$historial->fecha_revision}}</td>
                                <td>{{$historial->costo_atencion}}</td>
                                <td>
                                    <a href={{route("historial.edit", $historial->id_revision)}} class="btn btn-warning btn-sm">
                                        🖊
                                    </a>

                                    <a href={{route("historial.show", $historial->id_revision)}} class="btn btn-info btn-sm">
                                        👁
                                    </a>

                                    <form action="{{ route('historial.destroy', $historial->id_revision) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este historial?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            🗑
                                        </button>
                                    </form>

                                </td>
                            </tr>                            
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No hay registros
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!--Botones-->
                {{$historiales->links()}}
        </div>
    </div>
@endsection
