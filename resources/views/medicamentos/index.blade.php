@extends('menu')

@section('content')

<div class="container w-75 border p-4 mt-4">
    @if(session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Vencimiento</th>
        <th scope="col"></th> <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicamentos as $medicamento)
        <tr>
        <th scope="row">{{$medicamento->id}}</th>
        <td>{{$medicamento->nombre}}</td>
        <td>{{$medicamento->descripcion}}</td>
        <td>{{$medicamento->vencimiento}}</td>
        <td><form action="{{route('medicamentos-delete', $medicamento->id)}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar" class="btn btn-danger">
        </form></td>
        <td><a class="btn btn-primary" href="{{route('medicamentos-edit', ['id' => $medicamento->id])}}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('medicamentos-add')}}">Añadir</a>
</div>

@endsection