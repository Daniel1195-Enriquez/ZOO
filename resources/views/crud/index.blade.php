@extends("layouts.main")

@section("Contenido")
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <h2>Mi crud del zoologico</h2>
                <a href="{{route('historial.index')}}" class="btn btn-success">Historial médico</a>
                <a href="{{route('asignacion.index')}}" class="btn btn-success">Asignación</a>
                <a href="{{route('animales.index')}}" class="btn btn-success">Animales</a>
                <a href="{{route('cuidadores.index')}}" class="btn btn-success">Cuidadores</a>
                <a href="{{route('habitats.index')}}" class="btn btn-success">Habitats</a>
                <a href="{{route('especies.index')}}" class="btn btn-success">Especies</a>
                <hr>                

            </div>
        </div>

        <div class="container mt-4 text-center">
            <img src="https://media.illustrationx.com/images/artist/leinegrafikAnimationswerk/171290/webp/2000/zoo-entrance-animals-illustration.webp"
            class="img-fluid rounded shadow" alt="Descripción de la imagen">

        </div>
    </div>
@endsection
