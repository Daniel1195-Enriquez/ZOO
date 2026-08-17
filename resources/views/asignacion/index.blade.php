@extends("layouts.main")

@section("Contenido")
    <div class="container mt-4">
        <div class="row">
            <h2>Asignación de cuidador</h2>  
            @if(session('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>
            @endif
            <div class="input-group gap-2 mb-3">
                <form action="{{ route('asignacion.index') }}" method="GET" class="input-group gap-2 mb-3">
                    <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                    <a href="{{route('asignacion.create')}}" class="btn btn-success">Asignar nuevo cuidador</a>              
                    <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px">
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                    <a href="{{route('asignacion.index')}}" class="btn btn-outline-danger">Borrar</a>
                </form>
            </div>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Habitat</td>
                            <td>Cuidador</td>
                            <td>Turno</td>                           
                            <td>Acciones</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asignaciones as $asignacion)                            
                            <tr>                                
                                <td>{{$asignacion->nombre_habitat}}</td>
                                <td>{{$asignacion->nombre_cuidador}}</td>
                                <td>{{$asignacion->turno}}</td>                                
                                <td>
                                    <a href={{route("asignacion.edit", [                                        
                                        'id_habitat' => $asignacion->id_habitat,
                                        'id_cuidador' => $asignacion->id_cuidador
                                        ]) }} class="btn btn-warning btn-sm">
                                        🖊
                                    </a>

                                    <a href={{route("asignacion.show",[
                                        'id_habitat' => $asignacion->id_habitat,
                                        'id_cuidador' => $asignacion->id_cuidador
                                        ])}} class="btn btn-info btn-sm">
                                        👁
                                    </a>

                                    <form action="{{ route('asignacion.destroy', [
                                        'id_habitat' => $asignacion->id_habitat,
                                        'id_cuidador' => $asignacion->id_cuidador
                                    ]) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?')">

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
                                    <td colspan="4" class="text-center text-muted py-4">
                                        No hay registros
                                    </td>
                                </tr>  
                        @endforelse
                    </tbody>
                </table>
                <!--Botones-->
                {{$asignaciones->links()}}
        </div>
    </div>
@endsection
