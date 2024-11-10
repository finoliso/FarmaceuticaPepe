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
        <th scope="col">Doctor</th>
        <th scope="col">Instrucciones</th>
        <th scope="col">Medicamento</th>
        <th scope="col"></th> <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($recetas as $receta)
        <tr>
        <th scope="row">{{$receta->id}}</th>
        <td>{{$receta->doctor}}</td>
        <td>{{$receta->instrucciones}}</td>
        <td>{{$receta->medicamento->nombre}}</td>
        <td><form action="{{route('recetas-delete', $receta->id)}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar" class="btn btn-danger">
        </form></td>
        <td><a class="btn btn-primary" href="{{route('recetas-edit', ['id' => $receta->id])}}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('recetas-add')}}">Añadir</a>
</div>

@endsection