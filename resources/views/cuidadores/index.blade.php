@extends("layouts.main")

@section("Contenido")
    <div class="container mt-4">
        <div class="row">
            <h2>Cuidadores</h2>
            @if (session('error'))
                <script>
                    alert("{{session('error')}}");
                </script>    
            @endif

            <div class="input-group gap-2 mb-3">
                <form action="{{route('cuidadores.index')}}" method="GET" class="input-group gap-2 mb-3">
                    <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                    <a href="{{route('cuidadores.create')}}" class="btn btn-success">Agregar un nuevo cuidador</a>
                    <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px;">
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                    <a href="{{route('cuidadores.index')}}" class="btn btn-outline-danger">Borrar</a>
                </form>
            </div>
                <hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Especialidad</td>
                            <td>Salario</td>                           
                            <td>Acciones</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cuidadores as $cuidador)                            
                            <tr>
                                <td>{{$cuidador->nombre}}</td>                                
                                <td>{{$cuidador->especialidad}}</td>
                                <td>{{$cuidador->salario}}</td>
                                <td>
                                    <a href="{{route("cuidadores.edit", $cuidador->id_cuidador)}}" class="btn btn-warning btn-sm">
                                        🖊
                                    </a>
                                    
                                    <a href="{{route("cuidadores.show", $cuidador->id_cuidador)}}" class="btn btn-info btn-sm">
                                        👁
                                    </a>

                                    <form action="{{route("cuidadores.destroy", $cuidador->id_cuidador)}}"
                                        method="post"
                                        onsubmit="return confirm('¿Estás seguro de que se desea eliminar este cuidador?')">
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
                <!--botones-->
                {{$cuidadores->links()}}
        </div>
    </div>
@endsection
