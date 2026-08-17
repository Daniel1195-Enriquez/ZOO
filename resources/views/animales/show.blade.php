@extends("layouts.main")
@section("Contenido")

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actulizar a un Animal</h4>
                </div>               
                    <div class="card-body">                        
                            
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="nombre"
                                    name="nombre"
                                    value="{{$animal -> nombre}}"
                                    readonly>                          

                            </div>                       

                            <div class="mb-3">
                                <label class="form-label">Especie</label>
                                <input type="text"
                                       class="form-control"
                                       id="nombre_comun"
                                       value="{{$especies->firstWhere('id_especie', $animal->id_especie)->nombre_comun}}"
                                       readonly>                                
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Habitat</label>     
                                <input type="text"
                                       class="form-control"
                                       id="nombre"
                                       value="{{$habitats->firstWhere('id_habitat',$animal->id_habitat)->nombre}}"
                                       readonly>    
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fecha nacimiento</label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    name="fecha_nacimiento"
                                    id='fecha_nacimiento'                                    
                                    value="{{$animal-> fecha_nacimiento}}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Género</label>
                                <input type="text"
                                       class="form-control"
                                       name="genero"
                                       id='genero'
                                       value="{{$animal->genero}}" 
                                       readonly>                                
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Peso</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="peso_kg"
                                    step="0.01"
                                    id='peso_kg'                                    
                                    value="{{$animal-> peso_kg}}"
                                    readonly>
                            </div>

                            <a href="{{route('animales.index')}}" type="button" class="btn btn-info me-2">
                                Volver
                            </a>                          
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
@endsection