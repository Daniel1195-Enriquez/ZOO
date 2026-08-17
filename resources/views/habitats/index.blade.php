@extends("layouts.main")

@section("Contenido")
    <div class="container mt-4">
        <div class="row">
            <h2>Habitats</h2>
            @if(session('error'))                
                <script>
                    alert("{{session('error') }}")    
                </script>                
            @endif
            <div class="input-group gap-2 mb-3">
                <form action="{{route('habitats.index')}}" method="GET" class="input-group gap-2 mb-3">
                    <a href="{{route('crud.index')}}" class="btn btn-danger">Volver</a>
                    <a href="{{route('habitats.create')}}" class="btn btn-success"> Agregar un nuevo habitat</a>
                    <input type="text" name="buscar" value="{{request('buscar')}}" class="form-control" style="max-width: 300px;">
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                    <a href="{{route('habitats.index')}}" class="btn btn-outline-danger">Borrar</a>
                </form>
            </div>
            <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>                           
                            <td>Clima</td>
                            <td>Capacidad máxima</td>
                            <td>Acciones</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($habitats as $habitat )
                            <tr>
                                <td>{{$habitat->nombre}}</td>
                                <td>{{$habitat->clima}}</td>
                                <td>{{$habitat->capacidad_max}}</td>
                                <td>
                                    <a href="{{route("habitats.edit", $habitat->id_habitat)}}" class="btn btn-warning btn-sm">
                                        🖊
                                    </a>

                                    <a href="{{route("habitats.show", $habitat->id_habitat)}}" class="btn btn-info btn-sm">
                                        👁
                                    </a>
                                    
                                    <form action="{{route("habitats.destroy", $habitat->id_habitat)}}"
                                        method="post"
                                        onsubmit="return confirm('¿Estás seguro de que se desea eliminar este habitat?')">
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
                                    No hay Registros
                                </td>
                            </tr>
                                           
                        @endforelse
                    </tbody>
                </table>  
                <!--Botones-->          
                {{$habitats->links()}}
        </div>
    </div>
@endsection
