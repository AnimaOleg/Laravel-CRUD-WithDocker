@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Listado de Puertas con CRUD</h2>
        </div>
        <div>
            <!-- OLEG - Añadida ruta -->
            <a href="{{route('puertas.create')}}" class="btn btn-primary">Crear Puerta</a>
        </div>
    </div>

    <!-- OLEG - Muestreo de Exitos -->
    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong><br>
        </div>
    @endif

    <!-- Oleg - Paginador -->
    <div class="col-12 mt-2" style="background-color: white; padding: 6px">
        {{$puertas->links()}}
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Material</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>

            @foreach ($puertas as $puerta)
                <tr>
                    <td class="fw-bold">{{$puerta->nombre}}</td>
                    <td><span class="badge bg-warning fs-6">{{$puerta->status}}</span></td>
                    <td><span class="badge bg-success fs-6">{{$puerta->material}}</span></td>
                    <td>{{$puerta->descripcion}}</td>
                    <td>{{$puerta->precio}}</td>
                    <td>{{$puerta->due_date}}</td>
                    <td>
                        <a href="{{ route('puertas.show', $puerta->id) }}" class="btn btn-success">Ver</a>
                        <a href="{{ route('puertas.edit', $puerta->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{route('puertas.destroy', $puerta)}}" method="POST" class="d-inline">
                            <!-- Oleg -->
                            @csrf
                            <!-- Oleg -->
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection