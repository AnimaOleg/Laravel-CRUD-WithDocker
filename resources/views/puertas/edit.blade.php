@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Puerta</h2>
        </div>
        <div>
            <a href="{{route('puertas.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <!-- OLEG - Muestreo de Errorres -->
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>Por las chanclas de mi madre!</strong> Algo fue mal..<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('puertas.update', $puerta)}}" method="POST">
        <!-- OLEG - Añadir Toquen - Evitar CrossFit/AtaqueCruzado -->
        @csrf
        <!-- OLEG - Falsear método para que funcione como PUT/PATCH -->
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Tarea" value="{{$puerta->nombre}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Tipo:</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Jardin" @selected("Jardín" == $puerta->status)>Jardín</option>
                        <option value="Rellano" @selected("Rellano" == $puerta->status)>Rellano</option>
                        <option value="Garaje" @selected("Garaje" == $puerta->status)>Garaje</option>
                        <option value="Castillo" @selected("Castillo" == $puerta->status)>Castillo</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Material:</strong>
                    <select name="material" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Madera" @selected("Madera" == $puerta->material)>Madera</option>
                        <option value="Acero" @selected("Acero" == $puerta->material)>Acero</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción...">{{$puerta->descripcion}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="number" step="any" class="form-control" name="precio" value="{{$puerta->precio}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" id="" value={{$puerta->due_date}}>
                    <!-- Cuadrar campo con el de la BD -->
                    <!-- <input type="date" name="due_datetime => due_date" class="form-control" id=""> -->
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection